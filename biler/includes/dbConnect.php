<?php
function db_connect() {

    // Define connection as a static variable, to avoid connecting more than once
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
        // Load configuration as an array. Use the actual location of your configuration file
        $location = $_SERVER['DOCUMENT_ROOT'];

        $connection = mysqli_connect('localhost','colin','bobbob','deleleasing_dk_db');
        mysqli_set_charset($connection,'utf8');
    }

    // If connection was not successful, handle the error
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);

    }
    return $connection;
}



