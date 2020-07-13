<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

class home extends Controller {
	public $RequireValidation = false;

	protected function _russian( $s) {
		$len = strlen( trim( $s, ' ?.,!'));
		if ( $len > 0) {
			$res = preg_match_all( '/[А-Яа-яЁё]/u', $s);
			return round($res / $len, 2);

		}

		return ( $len);

	}

	protected function postHandler() {
		$action = $this->getPost( 'action');
		if ( 'Submit' == $action) {
			$soz = $this->getPost('soz');
			if ( 'accepted' == $soz) {
				$_comments = $this->getPost('comments');
				/*--- ---[ruskies]--- ---*/
				$pr = $this->_russian( $_comments);
				/*--- ---[ruskies]--- ---*/

				$contactName = $this->getPost('contactName');
				$email = $this->getPost('email');

				$comments = sprintf( '%s%s%sIP : %s', $_comments, PHP_EOL, PHP_EOL, $this->Request->getRemoteIP());
				if ( $pr > .3) {
					$comments .= sprintf('%s%s russian', PHP_EOL, $pr * 100);

				}
				$comments .= sprintf('%suserAgent: %s', PHP_EOL, \userAgent::toString());

				$sendCopy = $this->getPost('sendCopy');

				$mail = sys::mailer();
				$mail->addReplyTo( $email, $contactName );
				$mail->AddAddress( config::$SUPPORT_EMAIL, config::$SUPPORT_NAME);
				$mail->Subject = sprintf( '%s Contact : %s', config::$WEBNAME, $contactName);
				$mail->MsgHTML( sys::text2html( $comments ));

				if ( $sendCopy == 'true' )
					$mail->AddCC( $email, $contactName );

				Response::redirect( $mail->Send() ? url::tostring( 'success' ) : url::tostring( 'failure/?err=' . urlencode( $mail->ErrorInfo)));

			}
			// else {
			// 	throw new Exceptions\soz;
			//
			// }

		}
		elseif ( 'send-message' == $action) {
			$soz = $this->getPost('soz');
			if ( 'accepted' == $soz) {
				$_comments = $this->getPost('comments');
				/*--- ---[ruskies]--- ---*/
				$pr = $this->_russian( $_comments);
				/*--- ---[ruskies]--- ---*/

				$contactName = $this->getPost('contactName');
				$email = $this->getPost('email');

				$comments = sprintf( '%s%s%sIP : %s', $_comments, PHP_EOL, PHP_EOL, $this->Request->getRemoteIP());
				if ( $pr > .3) {
					$comments .= sprintf('%s%s russian', PHP_EOL, $pr * 100);

				}
				$comments .= sprintf('%suserAgent: %s', PHP_EOL, \userAgent::toString());

				$sendCopy = ( 'yes' == $this->getPost('sendCopy'));

				$mail = sys::mailer();
				$mail->addReplyTo( $email, $contactName );
				$mail->AddAddress( config::$SUPPORT_EMAIL, config::$SUPPORT_NAME);
				$mail->Subject = sprintf( '%s Contact : %s', config::$WEBNAME, $contactName);
				$mail->MsgHTML( sys::text2html( $comments ));

				if ( $sendCopy) {
					$mail->AddCC( $email, $contactName );

				}

				if ( $mail->Send()) {
					\Json::ack( $action);

				}
				else {
					\Json::nak( $mail->ErrorInfo);

				}

			}
			// else {
			// 	throw new Exceptions\soz;
			//
			// }

		}
		elseif ( 'verify-captcha' == $action) {
			if ( \config::$captcha) {
				if ( $token = $this->getPost('token')) {
					$req = new \HttpPost('https://www.google.com/recaptcha/api/siteverify');
					$req->setPostData([
						'secret' => \config::$captcha->private,
						'response' => $token

					]);

					$req->send();
					if ( $response = $req->getResponse()) {
						// sys::logger( sprintf('%s :: %s', $action, $response));
						\Json::ack( $action)
						->add('data', @json_decode( $response))
						->add('soz','accepted');

					} else { \Json::nak( sprintf('%s - bad response', $action)); }

				} else { \Json::nak( sprintf('%s - no token', $action)); }

			} else { \Json::nak( sprintf('%s - not configured', $action)); }

		}
		else {
			sys::logger( sprintf( '%s :: nak', $action));

		}

	}

	protected function _index( $option = '') {
		// $this->_react();
		$this->_traditional( $option);

	}

	protected function _react() {
		site\www::instance()
			->serve( $_SERVER['REQUEST_URI']);

	}

	protected function render( $params) {
		$p = parent::render( $params);

		if ( isset( $params['parallax'])) {
			$this->_render( $params['parallax']);

		}

	}

	protected function _traditional( $option = '') {
		$render = [
			'css' => [
				sprintf( '<link rel="canonical" href="%s" />', url::$URL)

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

		if ( 'success' == $option) {
			array_unshift( $render['parallax'], 'success');

		}
		elseif ( $option == 'failure') {
			array_unshift( $render['parallax'], 'failure');

		}

		if ( \config::$captcha) {
			$render['scripts'] = [
				'<script src="https://www.google.com/recaptcha/api.js?render=6Le2OXgUAAAAAJlZnzozDmuZeI2B-mbmJKqABvq3"></script>'

			];

			$render['parallax'][] = 'captcha';

		}
		else {
			$render['parallax'][] = 'captcha-none';

		}

		$this->render( $render);

	}

	protected function _legacy( $option = '') {
		$p = new page;
			$p->css[] = sprintf( '<link rel="canonical" href="%s" />', url::$URL);
			if ( \config::$captcha) {
				$p->scripts[] = '<script src="https://www.google.com/recaptcha/api.js?render=6Le2OXgUAAAAAJlZnzozDmuZeI2B-mbmJKqABvq3"></script>';

			}

			$p
				->header()
				->title('navbar-18');

			if ( $option == 'success') {
				new dvc\html\div( 'Successfully sent message', ['class' => 'alert alert-success', 'style' => 'margin-top: 90px; margin-left: 5px; max-width: 80%;']);

			}
			elseif ( $option == 'failure') {
				new dvc\html\div( sprintf( '<b>Failed to send message</b> %s', $this->getParam('err')),
					['class' => 'alert alert-warning', 'style' => 'margin-top: 90px; margin-left: 5px; max-width: 80%;']);

			}

			$this->load('home-18');
			$this->load('home-18-about');
			$this->load('home-18-contact');

			if ( \config::$captcha) {
				$this->load('captcha');

			}

	}

	public function checkin() {
		if ( $key = $this->getParam('api')) {

			if ( $locale = $this->getParam('locale')) {

				if ( $event = $this->getParam('event')) {

					$dao = new dao\users;
					if ( $user = $dao->getUserByKey( $key )) {

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

					} else { \Json::nak( 'checkin' ); }

				} else { \Json::nak( 'checkin::event' ); }

			} else { \Json::nak( 'checkin::locale' ); }

		} else { \Json::nak( 'checkin' ); }

	}

	public function dbinfo() {
		if ( currentUser::isProgrammer() || $this->Request->ServerIsLocal()) {
			$this->render([
				'title' => 'dbinfo',
				'primary' => 'db-info',
				'secondary' => 'index']);

		}
		else {
		site\www::instance()
			->serve( '');

		}

	}

	public function index( $option = '') {
		$this->isPost() ?
			$this->postHandler() :
			$this->_index( $option);

	}

	public function tides() {
		$target = 'http://www.bom.gov.au/australia/tides/print.php' .
			'?aac=QLD_TP011' .
			'&type=tide' .
			'&date=' . date( 'Y-m-d' ) .
			'&region=QLD' .
			'&tz=Australia/Brisbane' .
			'&days=3';

		Response::redirect( $target );

	}

	public function privacy() {
		$p = new page;
			$p->css[] = sprintf( '<link rel="canonical" href="%s" />', url::tostring('privacy'));
			$p
				->header()
				->title('navbar-18');

			$this->load('privacy');

	}

}
