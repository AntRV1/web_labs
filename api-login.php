<?php
session_name('auth');
session_start();
$method = $_SERVER['REQUEST_METHOD'];

include 'database_function.php';

$salt = 'myPass';

try {
  if ($method === 'POST') {
    $dataAsJson = file_get_contents('php://input');
    $dataAsArray = json_decode($dataAsJson, true);  
    $loginEmail = $dataAsArray['email'];
    $loginPassword = md5(md5($dataAsArray['password']).$salt);
  }

  $conn = createDBConnection();
  $loginEmail = mysqli_real_escape_string($conn, $loginEmail);

  // $user = getUser($loginEmail);
  // $userId = $user['id'];

  $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$loginEmail' AND password = '$loginPassword'");
    if (mysqli_num_rows($query) > 0) {
      $user = getUser($loginEmail);
      $userId = $user['id'];
      $userEmail = $user['email'];
      $_SESSION['id'] = $userId;
      $_SESSION['name'] = $userEmail;
      header("Location: admin_form.php");
      die();
    } else {
      throw new Error('Неверный логин или пароль');    
    }

  // if (($loginPassword == $user['password']) && ($loginEmail == $user['email'])) {
  //   $_SESSION['id'] = $userId;
  //   $_SESSION['name'] = $loginEmail;
  //   header("Location: admin_form_upd.php");
  //   die();
  // } else {
  //   throw new Error('Неверный логин или пароль');
  //   header("Location: login_admin_upd.php");    
  // }
} catch(\Throwable $th) {
  header("HTTP/1.1 401 Not Found");
  die($th->getMessage());
}
