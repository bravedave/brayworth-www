<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

namespace dvc\sqlite;

$dbc = new dbCheck( $this->db, 'users' );

$dbc->defineField( 'Surname', 'text');
$dbc->defineField( 'GivenNames', 'text');
$dbc->defineField( 'displayname', 'text');
$dbc->defineField( 'email', 'text');
$dbc->defineField( 'guests', 'text');
$dbc->defineField( 'key', 'text');
$dbc->defineField( 'timezone', 'text');
$dbc->defineField( 'db_prefix', 'text');
$dbc->check();
