<?php
/*
	David Bray
	BrayWorth Pty Ltd
	e. david@brayworth.com.au

	This work is licensed under a Creative Commons Attribution 4.0 International Public License.
		http://creativecommons.org/licenses/by/4.0/

	*/
NameSpace dvc;

abstract class config extends _config {
	static $WEBNAME = 'Brayworth Web Design';
	static $SUPPORT_NAME = 'David Bray';
	static $SUPPORT_EMAIL = 'david@brayworth.com.au';
	static $EMAIL_ERRORS_TO_SUPPORT = TRUE;
	//~ static $MAILSERVER = 'mail';

}

pages\bootstrap::$BootStrap_Version = '4';