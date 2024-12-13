<?php
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "podcast_db");

$title = $_POST['title'];
$language = $_POST['language'];
$description = $_POST['description'];

// Handle file uploads
$image = $_FILES['image']['name'];
$audio_file = $_FILES['audio_file']['name'];

$image_path = "uploads/" . basename($image);
$audio_path = "uploads/" . basename($audio_file);

move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
move_uploaded_file($_FILES['audio_file']['tmp_name'], $audio_path);

$stmt = $conn->prepare("INSERT INTO podcasts (title, language, description, image, audio_file) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $title, $language, $description, $image_path, $audio_path);

if ($stmt->execute()) {
    echo json_encode(["message" => "Podcast added successfully"]);
} else {
    echo json_encode(["message" => "Error adding podcast"]);
}
?>
