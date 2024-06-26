<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'connection.php';
// $conn = get_connection();

// if ($conn->connect_error) {
//     die("Error in connection: " . $conn->connect_error);
// }

     function uploadImage(){
    // $name = $_POST['name'];
    // $latitude = $_POST['latitude'];
    // $longitude = $_POST['longitude'];
    $image = $_FILES['image']['name'];
    $target_dir = "../assets/image/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            die("File is not an image.");
        }
    }
    
    // Move uploaded file to target directory
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        die("Error uploading file.");
    }
    
    $target_dir = "./assets/image/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    // Insert data into database
    $query = "INSERT INTO restaurant (name, latitude, longitude, image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Error in preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ssss", $name, $latitude, $longitude, $target_file);
    $result = $stmt->execute();
    
    if ($result) {
        echo "Data successfully saved.";
    } else {
        echo "Error in saving data: " . $conn->error;
    }
}
?>