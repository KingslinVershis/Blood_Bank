<?php 

//Variable Declaration

$name=$_POST['name'];
$mail=$_POST['mail'];
$textarea=$_POST['feedback'];

//Database Connection

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into feedback(Name,Email,Feedback)values(?,?,?)");
    $stmt->bind_param("sss",$name,$mail,$textarea);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>


