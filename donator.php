<?php
$name=$_POST['name'];
$mail=$_POST['mail'];
$state=$_POST['state'];
$country=$_POST['country'];
$amount=$_POST['amount'];
$city=$_POST['city'];
$number=$_POST['number'];

$conn=new mysqli('localhost','root','','test');
if($conn->connect_error)
    {
        die('connection failed :'.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("insert into `donator-details`(Name,Email,Number,City,State,Country,Amount)
        values(?,?,?,?,?,?,?)");
        $stmt->bind_param("ssisssi",$name,$mail,$number,$city,$state,$country,$amount);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
?>