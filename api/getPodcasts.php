<?php
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "podcast_db");

$result = $conn->query("SELECT * FROM podcasts");

$podcasts = [];
while ($row = $result->fetch_assoc()) {
    $podcasts[] = $row;
}

echo json_encode($podcasts);
?>
