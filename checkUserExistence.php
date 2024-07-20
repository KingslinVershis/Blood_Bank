<?php
// checkUserExistence.php

$name = $_POST['name'];
$email = $_POST['mail'];

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $select = "SELECT * FROM signup WHERE Name = '$name' OR Email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $select);
    $user = mysqli_fetch_assoc($result);
    $response =  " <script>[
        
        'usernameExists' : false,
        'emailExists' : false
        
    ];</script>";
    $jsonResponse = json_encode($response);
    if ($user) {
        if ($user['Name'] === $name) {
            $response['usernameExists'] = true;
        }
        if ($user['Email'] === $email) {
            $response['emailExists'] = true;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
   //echo $jsonResponse; 
}
?>