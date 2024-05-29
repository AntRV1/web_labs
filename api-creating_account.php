<?php
$method = $_SERVER['REQUEST_METHOD'];

include 'database_function.php';

$conn = createDBConnection();
$salt = 'myPass';

if ($method === 'POST') {  
  $dataAsJson = file_get_contents('php://input');
  $dataAsArray = json_decode($dataAsJson, true);  
  $loginEmail = $dataAsArray['email'];
  $loginPassword = $dataAsArray['password'];
  // $loginPassword = md5(md5($dataAsArray['password']).$salt);

  // $user = getUser($loginEmail);

  // if(!isset($user)) {
    // $sql = "INSERT INTO users (email, password)
    //         VALUES(?, ?)";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("ss", $loginEmail, $loginPassword);

    // $sql = "INSERT INTO users (email, password) 
    // VALUES ('$loginEmail', '$loginPassword')";
    
    // if ($stmt->execute()) {
    //   echo 'Данные успешно добавлены в базу';
    //   header("Location: login_admin_upd.php");
    // } else {
    //   echo 'Ошибка';
    // }
  // }

  $md5_password = md5(md5($loginPassword).$salt);
  $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$loginEmail'");
  if (mysqli_num_rows($query) == 0) {
    mysqli_query($conn, "INSERT INTO users (email, password) VALUES ('$loginEmail', '$md5_password')");
    // $sql = "INSERT INTO users (email, password) VALUES(?, ?)";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("ss", $loginEmail, $md5_password)
    // mysqli_query($conn, $sql);
    header("Location: login_admin_upd.php");
  } else {
    echo("Ошибка: Логин занят другим пользователем.");
  }
}

closeDBConnection($conn);