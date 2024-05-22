<?php
$method = $_SERVER['REQUEST_METHOD'];

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

    // $sql = "INSERT INTO post (title, subtitle, author_name, author_avatar, publish_date, image_src, content, featured) 
    // VALUES ('$title', '$subtitle', '$author_name', '$author_avatar', '$publish_date', '$image_src', '$content', '$featured')";

    // $sql = $conn->prepare("INSERT INTO post (title, subtitle, author_name, author_avatar, publish_date, image_src, image_alt, content, featured, most_recent, label)
    //                         VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
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
