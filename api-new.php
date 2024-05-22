<?php
$method = $_SERVER['REQUEST_METHOD'];

include 'database_function.php';

$conn = createDBConnection();

if ($method === 'POST') {
  $dataAsJson = file_get_contents('php://input');
  $dataAsArray = json_decode($dataAsJson, true);
  $title = $dataAsArray['title'];
  $subtitle = $dataAsArray['subtitle'];
  $author_name = $dataAsArray['author_name'];
  $author_avatar = $dataAsArray['author_avatar'];
  $publish_date = $dataAsArray['publish_date'];
  $image_src = $dataAsArray['image_src'];
  $image_alt = $dataAsArray['image_alt'];
  $content = $dataAsArray['content'];
  $featured = $dataAsArray['featured'];
  $most_recent = $dataAsArray['most_recent'];
  $label = $dataAsArray['label'];

  saveImage($title, $dataAsArray['image']);
  saveImage($author_name, $dataAsArray['photo']);
  
  $sql = "INSERT INTO post (title, subtitle, author_name, author_avatar, publish_date, image_src, image_alt, content, featured, most_recent, label)
          VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssssssiii", $title, $subtitle, $author_name, $author_avatar, $publish_date, $image_src, $image_alt, $content, $featured, $most_recent, $label);
  
  if ($stmt->execute()) {
    echo 'Данные успешно добавлены в базу';
  } else {
    echo 'Ошибка';
  }
}
