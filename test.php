<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
    $conn = new mysqli( HOST, USERNAME, PASSWORD, DATABASE );
    if ( $conn->connect_error ) {
        die( 'Connection failed: '. $conn->connect_error );
    }
    echo 'Connected successfully<br>';
    return $conn;
}

function closeDBConnection( mysqli $conn ): void {
    $conn->close();
}

function getAndPrintPostsFromDB( mysqli $conn ): void {
    $sql = 'SELECT * FROM post';
    $result = $conn->query( $sql );
    if ( $result->num_rows == 0 ) {
        echo '0 results';
        return;
    }
    
    while( $row = $result->fetch_assoc() ) {
        switch ($row['featured']) {
            case 0:                    
                echo "id: {$row['id']} - Title: {$row['title']} - Subtitle: {$row['subtitle']} -Author_name: {$row['author_name']}
                    -Author_avatar: {$row['author_avatar']} -Image_src: {$row['image_src']} - Date: {$row['publish_date']} 
                    -Is Featured: {$row['featured']} <br>";
                break;
            case 1:                    
                echo "id: {$row['id']} - Title: {$row['title']} - Subtitle: {$row['subtitle']} -Author_name: {$row['author_name']}
                    -Author_avatar: {$row['author_avatar']} -Image_src: {$row['image_src']} - Date: {$row['publish_date']} 
                    -Is Featured: {$row['featured']} <br>";
                break;
            default:
                echo "ERROR";
    }
    }
    

    // function getAndPrintPostsFromDB( mysqli $conn ): void {
    //     $sql = 'SELECT * FROM post WHERE featured = "0"';
    //     $result = $conn->query( $sql );
    //     if ( $result->num_rows > 0 ) {
    //         while( $row = $result->fetch_assoc() ) {
    //             echo "id: {$row['id']} - Title: {$row['title']} - Subtitle: {$row['subtitle']} -Author_name: {$row['author_name']}
    //                 -Author_avatar: {$row['author_avatar']} -Image_src: {$row['image_src']} - Date: {$row['publish_date']} 
    //                 -Is Featured: {$row['featured']} <br>";
    //         }
    //     } else {
    //         echo '0 results';
    //     }   
    // $sql = 'SELECT * FROM post WHERE featured = "1"';
    // $result = $conn->query( $sql );
    // if ( $result->num_rows > 0 ) {
    //     while( $row = $result->fetch_assoc() ) {
    //         echo "id: {$row['id']} - Title: {$row['title']} - Subtitle: {$row['subtitle']} -Author_name: {$row['author_name']}
    //             -Author_avatar: {$row['author_avatar']} -Image_src: {$row['image_src']} - Date: {$row['publish_date']} 
    //             -Is Featured: {$row['featured']} <br>";
    //     }
    // } else {
    //     echo '0 results';
    // }   

}
$conn = createDBConnection();
getAndPrintPostsFromDB( $conn );
closeDBConnection( $conn );
?>
