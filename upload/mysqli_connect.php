<?php 

// This file contains the database access information. 
// This file also establishes a connection to MySQL, 
// selects the database, and sets the encoding.

// Set the database access information as constants:
DEFINE ('DB_USER', 'boost_app');
DEFINE ('DB_PASSWORD', 'secret');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'boost');

// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');

// function to escape form data.
function escape_data ($data) {
  global $dbc; // Need the connection.
  if (ini_get('magic_quotes_gpc')) {
      $data = stripslashes($data);
  }
  return mysqli_real_escape_string($dbc, $data);
} 