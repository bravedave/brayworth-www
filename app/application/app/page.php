<?php
/*
 * Copyright (c) 2025 David Bray
 * Licensed under the MIT License. See LICENSE file for details.
*/

class page extends dvc\pages\bootstrap4 {

	function __construct($title = '') {
		
		parent::__construct($title);
		array_unshift($this->meta, '<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />');
		array_unshift($this->meta, '<meta name="viewport" content="width=device-width" />');
	}
}
