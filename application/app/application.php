<?php
/*
	David Bray
	BrayWorth Pty Ltd
	e. david@brayworth.com.au

	This work is licensed under a Creative Commons Attribution 4.0 International Public License.
		http://creativecommons.org/licenses/by/4.0/

	*/

class application extends dvc\application {
	private $_settings = false;

	static function run() {
		$app = new application( dirname( __FILE__ ) . '/../' );

	}

	public function getRootPath() {
		return isset( $this )  ?
			$this->rootPath :
			self::app()->getRootPath();

	}

}
