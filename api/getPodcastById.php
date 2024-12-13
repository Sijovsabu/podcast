<?php
header("Content-Type: application/json");
$conn = new mysqli("localhost", "root", "", "podcast_db");

$id = $_GET['id']; // Get the podcast ID from the URL parameter
$query = "SELECT * FROM podcasts WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(["message" => "Podcast not found"]);
}
?>
