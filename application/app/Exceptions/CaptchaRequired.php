<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

namespace Exceptions;

class CaptchaRequired extends Exception {
    public function __construct($message = null, $code = 0, Exception $previous = null) {

      $this->_text = sprintf( 'Captcha Required : %s', \Request::get()->getRemoteIP());

      // make sure everything is assigned properly
      parent::__construct( $this->_text, $code, $previous);

    }

}
