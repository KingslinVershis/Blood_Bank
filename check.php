<?php
// check.php

// Database Connection

$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Check if the name exists in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) ) {
  $name = $_POST['name'];

  // Prepare and execute a query to check if the name exists
  $stmt = $conn->prepare("SELECT * FROM signup WHERE Name = ?");
  $stmt->bind_param("s", $name);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  // Send JSON response indicating whether the name exists or not
  echo json_encode(['exists' => ($row !== null)]);

  $stmt->close();
  $conn->close();
}
?>
