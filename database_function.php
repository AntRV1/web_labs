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

function saveImage(string $imageName, string $imageBase64) {
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  $imageDecoded = base64_decode($imageBase64Array[1]);

  saveFile("images/{$imageName}.{$imgExtention}", $imageDecoded);
}

function closeDBConnection(mysqli $conn): void {
  $conn->close();
}
