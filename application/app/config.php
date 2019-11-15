<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * This work is licensed under a Creative Commons Attribution 4.0 International Public License.
 *      http://creativecommons.org/licenses/by/4.0/
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
