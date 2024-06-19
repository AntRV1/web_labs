<?php
$method = $_SERVER['REQUEST_METHOD'];

include 'database_function.php';

try {
  $conn = createDBConnection();
  $salt = 'myPass';

  if ($method === 'POST') {  
    $dataAsJson = file_get_contents('php://input');
    $dataAsArray = json_decode($dataAsJson, true);  
    $loginEmail = $dataAsArray['email'];
    $loginPassword = $dataAsArray['password'];
    $loginEmail = mysqli_real_escape_string($conn, $loginEmail);    
    $md5_password = md5(md5($loginPassword).$salt);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$loginEmail'");
    if (mysqli_num_rows($query) == 0) {
      mysqli_query($conn, "INSERT INTO users (email, password) VALUES ('$loginEmail', '$md5_password')");
      header("Location: login_admin.php");
    } else {
      // echo("Ошибка: Логин занят другим пользователем.");
      throw new Error('Ошибка: Логин занят другим пользователем.');
    }
  } 
} catch(\Throwable $th) {
  header("HTTP/1.1 401 Not Found");
  die($th->getMessage());
}

closeDBConnection($conn);