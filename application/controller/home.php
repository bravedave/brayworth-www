<?php
/**
	David Bray
	BrayWorth Pty Ltd
	e. david@brayworth.com.au

	This work is licensed under a Creative Commons Attribution 4.0 International Public License.
		http://creativecommons.org/licenses/by/4.0/

	*/
class home extends Controller {
	public $RequireValidation = FALSE;

	protected function postHandler() {
		$action = $this->getPost( 'action');
		if ( $action == 'Submit' ) {
			$riddle = $this->getPost('riddle');
			$mathCheck = $this->getPost('mathCheck');
			if ( (int)$riddle == (int)$mathCheck) {
				$contactName = $this->getPost('contactName');
				$email = $this->getPost('email');
				$comments = $this->getPost('comments');
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
				throw new Exceptions\CaptchaRequired;

			}

		}

	}

	public function __index( $option = '') {
		$p = new page;
			$p
				->header()
				->title('navbar-18');

			if ( $option == 'success') {
				new dvc\html\div( 'Successfully sent message', ['class' => 'alert alert-success', 'style' => 'margin-top: 90px; max-width: 400px;']);

			}
			elseif ( $option == 'failure') {
				new dvc\html\div( sprintf( '<b>Failed to send message</b> %s', $this->getParam('err')),
					['class' => 'alert alert-warning', 'style' => 'margin-top: 90px; max-width: 400px;']);

			}

			$this->load('home-18');
			$this->load('home-18-about');
			$this->load('home-18-contact');

	}

	public function index( $option = '') {
		if ( $this->isPost())
			$this->postHandler();

		else
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

}
