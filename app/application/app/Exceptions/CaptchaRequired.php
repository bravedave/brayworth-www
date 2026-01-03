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

use bravedave\dvc\Request;

class CaptchaRequired extends Exception {
  
  public function __construct($message = null, $code = 0, null|Exception $previous = null) {

    $this->_text = sprintf('Captcha Required : %s', Request::get()->getRemoteIP());

    // make sure everything is assigned properly
    parent::__construct($this->_text, $code, $previous);
  }
}
