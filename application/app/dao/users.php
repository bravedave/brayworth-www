<?php
/*
	David Bray
	BrayWorth Pty Ltd
	e. david@brayworth.com.au

	This work is licensed under a Creative Commons Attribution 4.0 International Public License.
		http://creativecommons.org/licenses/by/4.0/

	*/
namespace dao;

class users extends _dao {
	protected $_db_name = 'users';

	protected function selfchecks( dto\users &$dto ) {
		$this->checkPrefix( $dto );
		$this->checkKey( $dto);

	}

	protected function checkPrefix( dto\users &$dto ) {
		if ( $dto->db_prefix == '' ) {
			$dto->db_prefix = 'D' . str_pad( $dto->id, 4, '0', STR_PAD_LEFT );
			$this->UpdateByID( [ 'db_prefix' => $dto->db_prefix ], $dto->id);

		}

	}

	protected function checkKey( dto\users &$dto ) {
		if ( $dto->key == '' ) {
			$dto->key = hash( 'md5', (string)time() . (string)$dto->id );
			$this->UpdateByID( [ 'key' => $dto->key ], $dto->id);

		}

	}

	public function hasActiveSubscription( dto\users $dto) {
		$daoPP = new paypal;	// Namespace dao
		if ( $dtoPP = $daoPP->getFirstActiveSubscription( $dto)) {
			//~ sys::dump( $dtoPP);

			//~ sys::dump( $dto );
			if ( date( 'Y-m-d', strtotime( $dtoPP->verify_date )) == date( 'Y-m-d') && $dtoPP->verify_status == 'Active' ) {
				//~ sys::dump( $dtoPP);
				return ( true );
				
			}

			$ppAuth = sys::paypalAuth();	// Namespace dao
			if ( $pp = \paypal\api::GetRecurringPaymentsProfileDetails( $ppAuth, $dtoPP->profileid)) {
				if ( $pp->status() == 'Active' ) {
					$a = [
						'verify_date' => \dvc\db::dbTimeStamp(),
						'verify_status' => 'Active' 

					];

					$daoPP->UpdateByID( $a, $dtoPP->id );
					return  ( true );

				}

				//~ sys::dump( $pp );

			}

		}
		//~ else
			//~ sys::dump( $dto, 'No PP Records' );

		return ( FALSE );

	}

	public function getUserByEmail( $email ) {
		if ( $res = $this->db->result( sprintf( "select * from users where email = '%s'", $this->db->escape( $email )))) {
			if ( $row = $res->fetch()) {
				$dto = new dto\users( $row );
				$this->selfchecks( $dto);
				return ( $dto);

			}

		}

		return ( FALSE );

	}

	public function deleteUser( $id ) {
		$this->db->Q( "delete from users where `id` = $id");
		return ( TRUE );

	}

	public function getUserByKey( $key ) {
		if ( $res = $this->db->result( sprintf( "select * from users where `key` = '%s'", $this->db->escape( $key )))) {
			if ( $row = $res->fetch()) {
				$dto = new dto\users( $row );
				$this->selfchecks( $dto);
				return ( $dto);

			}

		}

		return ( FALSE );

	}

}
