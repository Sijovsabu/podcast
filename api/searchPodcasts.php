<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcast_db"; // Replace with your actual DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search query from the URL
$search = isset($_GET['search']) ? $_GET['search'] : '';

// SQL query to fetch podcasts, filtering by title if a search query is provided
$sql = "SELECT * FROM podcasts";
if ($search) {
    $sql .= " WHERE title LIKE '%" . $conn->real_escape_string($search) . "%'";
}

$result = $conn->query($sql);

$podcasts = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $podcasts[] = $row;
    }
}

// Return the filtered podcasts as a JSON response
echo json_encode($podcasts);

$conn->close();
?>
