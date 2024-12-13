<?php
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "podcast_db");

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];

// Get file paths
$result = $conn->query("SELECT image, audio_file FROM podcasts WHERE id = $id");
$files = $result->fetch_assoc();

unlink($files['image']);
unlink($files['audio_file']);

$stmt = $conn->prepare("DELETE FROM podcasts WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Podcast deleted successfully"]);
} else {
    echo json_encode(["message" => "Error deleting podcast"]);
}
?>
