<?php

const HOST = 'localhost';
const USERNAME = 'user';
const PASSWORD = 'password';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
  $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
  if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
  } else {                
      return $conn;
  }
} 

// function loginUser() {
//   try {
//     $email = $_GET['email'];
//     $conn = createDBConnection();
//     $email = mysqli_real_escape_string($conn, $email);
//     $sql = "SELECT * FROM user WHERE email = $email";
//     $result = $conn->query($sql);
//     $row = $result->fetch_assoc();
//     if(!isset($row)) {
//       throw new Exception ('Пользователь не найден.');
//     }
//     return $row;
//   } catch(Exception) {
//       header("Location: /404.php");      
//   }
// }

function getPostByID(): array {
  try {
    $postId = $_GET['id'];
    $conn = createDBConnection();
    $postId = mysqli_real_escape_string($conn, $postId);
    $sql = "SELECT * FROM post WHERE id = $postId";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(!isset($row)) {
      throw new Exception ('Пост не найден.');
    }
    return $row;
  } catch(Exception) {
      header("Location: /404.php");      
  }
}

function getPreviewByID(): array {
  try {
    $conn = createDBConnection();
    $sql = "SELECT * FROM post";
    $result = $conn->query($sql);
    $posts = [];
    if(!isset($result)) {
      throw new Exception ('Превью постов не найдены.');
    } else {
        while ($row = $result->fetch_assoc()) {
            array_push($posts, $row);
        }
    return $posts;
    }
  } catch(Exception) {
      header("Location: /404.php");      
  }
}
  
function saveFile(string $file, string $data): void {
  $myFile = fopen($file, 'w');
  if (!$myFile) {
    echo 'Произошла ошибка при открытии файла'."\n";
    return;
  }

  $result = fwrite($myFile, $data);
  if ($result) {
    echo 'Данные успешно сохранены в файл'."\n";
  } else {
    echo 'Произошла ошибка при сохранении данных в файл'."\n";
  }

  fclose($myFile);
}

function imageSrc(string $imageName, string $imageBase64) {
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  $imageSrc = "/static/images/{$imageName}.{$imgExtention}";

  return $imageSrc; 
}

function saveImage(string $imageName, string $imageBase64) {
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  $imageDecoded = base64_decode($imageBase64Array[1]);

  saveFile("images/{$imageName}.{$imgExtention}", $imageDecoded);   
}

function uuid4() {
  $id = bin2hex(random_bytes(18));

  $id[8] = "-";
  $id[13] = "-";
  $id[18] = "-";
  $id[23] = "-";
  $id[14] = "4";
  $id[19] = ["8", "9", "a", "b"][random_int(0, 3)];

  return $id;
}

function renameImage() {
  $nameImage = uuid4();
  return $nameImage;
}

function closeDBConnection(mysqli $conn): void {
  $conn->close();
}

function validString(array $data, $minLength, $maxLength) {
  if(is_string($data) && (strlen($data) >= 3) && (strlen($data) <= 255)) {
    return $data;
  }
  throw new Exception('Invalid string');
}
  
function validImage(string $imageBase64): bool {
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  if(($imgExtention == 'jpg')
    ||($imgExtention == 'jpeg')
    ||($imgExtention == 'png')
    ||($imgExtention == 'gif')) {
      return true;
    }
    throw new Exception('Invalid image');
}

function getUser(string $email): array {
  try {
    $conn = createDBConnection();    
    $email = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT * FROM users WHERE email = '$email'";    
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    
    if(!isset($row)) {
      throw new Exception ('Пользователь не найден.');
    }
    return $row;
  } catch(Exception $e) {
    throw $e;
  }
}
