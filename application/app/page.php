<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/
class page extends dvc\pages\bootstrap4 {

	function __construct($title = '') {
		parent::__construct($title);

		array_unshift($this->meta, '<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />');
		array_unshift($this->meta, '<meta name="viewport" content="width=device-width" />');
	}
}
