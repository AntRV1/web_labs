<?php
$method = $_SERVER['REQUEST_METHOD'];

include 'database_function.php';

$conn = createDBConnection();

if ($method === 'POST') {
  $nameImage = renameImage();  
  $dataAsJson = file_get_contents('php://input');
  $dataAsArray = json_decode($dataAsJson, true);    
  $publish_date = $dataAsArray['publish_date'];   
  $image_alt = $title;
  $content = $dataAsArray['content'];
  $featured = 0;
  $most_recent = 1;
  $label = 0;

  $image_src = imageSrc($nameImage, $dataAsArray['image']);
  $author_avatar =  imageSrc($dataAsArray['author_name'], $dataAsArray['photo']);
  $title = $dataAsArray['title'];
  $subtitle = $dataAsArray['subtitle'];
  $author_name = $dataAsArray['author_name'];

  saveImage($nameImage, $dataAsArray['image']);
  saveImage($author_name, $dataAsArray['photo']);

  // try {
  //   $title = validString($dataAsArray['title'], 3, 255);
  //   $subtitle = validString($dataAsArray['subtitle'], 3, 255);
  //   $author_name = validString($dataAsArray['author_name'], 3, 255);
  //   if(validImage($dataAsArray['image'])){
  //     $image_src = imageSrc($nameImage, $dataAsArray['image']);
  //     saveImage($nameImage, $dataAsArray['image']);
  //   }
  //   if(validImage($dataAsArray['photo'])) {
  //     $author_avatar =  imageSrc($dataAsArray['author_name'], $dataAsArray['photo']);
  //     saveImage($author_name, $dataAsArray['photo']);
  //   }   
    
    $sql = "INSERT INTO post (title, subtitle, author_name, author_avatar, publish_date, image_src, image_alt, content, featured, most_recent, label)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssiii", $title, $subtitle, $author_name, $author_avatar, $publish_date, $image_src, $image_alt, $content, $featured, $most_recent, $label);
    
    if ($stmt->execute()) {
      echo 'Данные успешно добавлены в базу';
    } else {
      echo 'Ошибка';
    }
//   } catch(Exception) {
//     header("Location: /404.php");      
// }
}

/////
