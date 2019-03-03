<?php
/*
	David Bray
	BrayWorth Pty Ltd
	e. david@brayworth.com.au

	This work is licensed under a Creative Commons Attribution 4.0 International Public License.
		http://creativecommons.org/licenses/by/4.0/

	*/

abstract class currentUser extends dvc\currentUser {
    static public function isProgrammer() {
		// if ( isset( self::user()->programmer)) {
		// 	return ( self::user()->programmer == 1 );

		// }

		// return ( self::isAdmin());

		return ( false);

	}

}