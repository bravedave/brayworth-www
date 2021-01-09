<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

abstract class config extends dvc\config {
	static $DB_TYPE = 'sqlite';	// needs to be mysql or sqlite to run

	static $WEBNAME = 'Brayworth Web Design';
	static $SUPPORT_NAME = 'David Bray';
	static $SUPPORT_EMAIL = 'david@brayworth.com.au';
	static $EMAIL_ERRORS_TO_SUPPORT = true;
	//~ static $MAILSERVER = 'mail';

	static $TIMEZONE = 'Australia/Brisbane';

}
