<?php
session_name('auth');
session_start();
$method = $_SERVER['REQUEST_METHOD'];

include 'database_function.php';

$salt = 'myPass';

if ($method === 'POST') {
  $dataAsJson = file_get_contents('php://input');
  $dataAsArray = json_decode($dataAsJson, true);  
  $loginEmail = $dataAsArray['email'];
  $loginPassword = md5(md5($dataAsArray['password']).$salt);
}

$user = getUser($loginEmail);
$userId = $user['id'];

// if ($loginEmail != $user['email']) {
//   header("Location: login_admin_upd.php");  
// }

if ($loginPassword == $user['password']) {
  $_SESSION['id'] = $userId;
  $_SESSION['name'] = $loginEmail;
  header("Location: admin_form_upd.php");
} else {
  header("Location: login_admin_upd.php");    
}
