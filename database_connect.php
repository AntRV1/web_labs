<?php

const HOST = 'localhost';
const USERNAME = 'user';
const PASSWORD = 'password';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } else {                
        return $conn;
    }
  }  
  