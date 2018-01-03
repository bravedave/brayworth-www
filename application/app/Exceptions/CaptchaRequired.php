<?php
/**
	David Bray
	BrayWorth Pty Ltd
	e. david@brayworth.com.au

	This work is licensed under a Creative Commons Attribution 4.0 International Public License.
		http://creativecommons.org/licenses/by/4.0/

	*/
NameSpace Exceptions;

class CaptchaRequired extends Exception {
    public function __construct($message = null, $code = 0, Exception $previous = null) {

      $this->_text = sprintf( 'Captcha Required : %s', \Request::get()->getRemoteIP());

      // make sure everything is assigned properly
      parent::__construct( $this->_text, $code, $previous);

    }

}
