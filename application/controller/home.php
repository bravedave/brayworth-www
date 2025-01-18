<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

use bravedave\dvc\{json, ServerRequest};

class home extends Controller {
	public $RequireValidation = false;

	protected function postHandler() {

		$request = new ServerRequest;
		$action = $request('action');

		return match ($action) {
			'send-message' => handler::sendMessage($request),
			'verify-captcha' => handler::verifyCaptcha($request),
			default => parent::postHandler()
		};
	}

	protected function _index($option = '') {

		$render = [
			'css' => [
				sprintf('<link rel="canonical" href="%s" />', url::$URL)
			],
			'parallax' => [
				'home-18',
				'home-18-about',
				'home-18-contact'
			],
			'meta' => [
				'<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />',
				'<meta name="viewport" content="width=device-width" />'
			],
			'navbar' => 'navbar-18'
		];

		if (config::$captcha) {

			$render['scripts'] = [
				'<script src="https://www.google.com/recaptcha/api.js?render=6Le2OXgUAAAAAJlZnzozDmuZeI2B-mbmJKqABvq3"></script>'
			];

			$render['parallax'][] = 'captcha';
		} else {

			$render['parallax'][] = 'captcha-none';
		}

		$this->render($render);
	}

	protected function render($params) {
		$p = parent::render($params);

		if (isset($params['parallax'])) {
			$this->_render($params['parallax']);
		}
	}

	public function checkin() {

		if ($key = $this->getParam('api')) {

			if ($locale = $this->getParam('locale')) {

				if ($event = $this->getParam('event')) {

					$dao = new dao\users;
					if ($user = $dao->getUserByKey($key)) {

						// $j = new dvc\Json();
						// $daoLocale = new dao\locale( $user);
						// if ( $localeDTO = $daoLocale->getLocale( $locale )) {

						// 	$a = array(
						// 		'date' => dvc\db::dbTimeStamp(),
						// 		'event' => $event,
						// 		'locale_id' => $localeDTO->id,
						// 		'remote_addr' => $this->Request->getServer( 'REMOTE_ADDR' ));

						// 	//~ phpinfo();
						// 	//~ sys::dump( $a );

						// 	$daoEvent = new dao\event( $user);
						// 	$daoEvent->Insert( $a );
						// 	$daoEvent->purge( $localeDTO->id );

						// 	$j->add( 'response', 'ack' );
						// 	//~ $j->add( 'a', $a);

						// }
						// else
						// 	$j->add( 'response', 'nAK' );

					} else {

						json::nak('checkin');
					}
				} else {

					json::nak('checkin::event');
				}
			} else {

				json::nak('checkin::locale');
			}
		} else {

			json::nak('checkin');
		}
	}

	public function dbinfo() {

		if (currentUser::isProgrammer() || $this->Request->ServerIsLocal()) {

			$this->render([
				'title' => 'dbinfo',
				'primary' => 'db-info',
				'secondary' => 'index'
			]);
		}
	}

	public function tides() {
		$target = 'http://www.bom.gov.au/australia/tides/print.php' .
			'?aac=QLD_TP011' .
			'&type=tide' .
			'&date=' . date('Y-m-d') .
			'&region=QLD' .
			'&tz=Australia/Brisbane' .
			'&days=3';

		Response::redirect($target);
	}

	public function privacy() {

		$p = new page;
		$p->css[] = sprintf('<link rel="canonical" href="%s" />', url::tostring('privacy'));
		$p
			->header()
			->title('navbar-18');

		$this->load('privacy');
	}
}
