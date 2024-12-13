<?php
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "podcast_db");

if ($conn->connect_error) {
    echo json_encode(["message" => "Database connection failed"]);
    exit();
}

$id = $_POST['id'];
$title = $_POST['title'];
$language = $_POST['language'];
$description = $_POST['description'];

// Fetch existing file paths
$result = $conn->query("SELECT image, audio_file FROM podcasts WHERE id = $id");
$existing_files = $result->fetch_assoc();

$image_path = $existing_files['image'];
$audio_path = $existing_files['audio_file'];

// Handle optional image upload
if (!empty($_FILES['image']['name'])) {
    $new_image = $_FILES['image']['name'];
    $new_image_path = "uploads/" . basename($new_image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $new_image_path)) {
        unlink($image_path); // Delete the old image file
        $image_path = $new_image_path;
    }
}

// Handle optional audio file upload
if (!empty($_FILES['audio_file']['name'])) {
    $new_audio = $_FILES['audio_file']['name'];
    $new_audio_path = "uploads/" . basename($new_audio);

    if (move_uploaded_file($_FILES['audio_file']['tmp_name'], $new_audio_path)) {
        unlink($audio_path); // Delete the old audio file
        $audio_path = $new_audio_path;
    }
}

$stmt = $conn->prepare("UPDATE podcasts SET title = ?, language = ?, description = ?, image = ?, audio_file = ? WHERE id = ?");
$stmt->bind_param("sssssi", $title, $language, $description, $image_path, $audio_path, $id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Podcast updated successfully"]);
} else {
    echo json_encode(["message" => "Error updating podcast"]);
}
?>
