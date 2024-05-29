<?php
$method = $_SERVER['REQUEST_METHOD'];

include 'database_function.php';

$conn = createDBConnection();

if ($method === 'POST') {
  $nameImage = renameImage();  
  $dataAsJson = file_get_contents('php://input');
  $dataAsArray = json_decode($dataAsJson, true);
  $title = $dataAsArray['title'];
  $subtitle = $dataAsArray['subtitle'];
  $author_name = $dataAsArray['author_name'];  
  $author_avatar =  imageSrc($dataAsArray['author_name'], $dataAsArray['photo']);
  $publish_date = $dataAsArray['publish_date'];  
  $image_src = imageSrc($nameImage, $dataAsArray['image']);
  $image_alt = $title;
  $content = $dataAsArray['content'];
  $featured = 0;
  $most_recent = 1;
  $label = 0;  

  saveImage($nameImage, $dataAsArray['image']);
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
