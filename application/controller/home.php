<?php
/*
	David Bray
	BrayWorth Pty Ltd
	e. david@brayworth.com.au

	This work is licensed under a Creative Commons Attribution 4.0 International Public License.
		http://creativecommons.org/licenses/by/4.0/

	*/
class home extends Controller {
	public $RequireValidation = FALSE;

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
			if ( '' == $soz) {
				$riddle = $this->getPost('riddle');
				$mathCheck = $this->getPost('mathCheck');
				if ( (int)$riddle && (int)$riddle < 20 && (int)$mathCheck && (int)$riddle == (int)$mathCheck) {

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
				else {
					print 'you did not successfully use this web site';
					// throw new Exceptions\CaptchaRequired;

				}

			}
			else {
				throw new Exceptions\soz;

			}

		}

	}

	public function __index( $option = '') {
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
			if ( userAgent::isLegit()) {
				$this->load('home-18-contact');

			}

			if ( \config::$captcha) {
				$this->load('captcha');

			}
			else {
				$path = sprintf('%srecaptcha.json',  \config::dataPath());
				sys::logger( sprintf('no captcha : %s', $path));
				// if ( file_exists( $path)) {
				// 	$a = json_decode( file_get_contents( $path));
				// 	if ( isset( $a->public)) {
				// 		\config::$captcha = (object)[
				// 			'public' => $a->public,
				// 			'private' => $a->private
				// 		];
				//
				// 	} // if ( isset( $a->web))
				//
				// } // if ( file_exists( $path))

			}

	}

	public function index( $option = '') {
		$this->isPost() ?
			$this->postHandler() :
			$this->__index( $option);

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
