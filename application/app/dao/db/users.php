<?php
/*
	David Bray
	BrayWorth Pty Ltd
	e. david@brayworth.com.au

	This work is licensed under a Creative Commons Attribution 4.0 International Public License.
		http://creativecommons.org/licenses/by/4.0/

	*/
namespace dvc\sqlite;

$dbc = new dbCheck( $this->db, $name );

$dbc->defineField( 'Surname', 'text');
$dbc->defineField( 'GivenNames', 'text');
$dbc->defineField( 'displayname', 'text');
$dbc->defineField( 'email', 'text');
$dbc->defineField( 'guests', 'text');
$dbc->defineField( 'key', 'text');
$dbc->defineField( 'timezone', 'text');
$dbc->defineField( 'db_prefix', 'text');
$dbc->check();
