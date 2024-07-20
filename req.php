<?php

//Variable Declaration

$name=$_POST['name'];
$mail=$_POST['mail'];
$address=$_POST['address'];
$phno=$_POST['number'];
$date=$_POST['date'];
$bloodgroup=$_POST['bloodgroup'];
$priority=$_POST['priority'];
$gender=$_POST['gender'];


//Database Connection

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into `patient_details`(Name,Email,Address,`Phone-No`,Date,Bloodgroup,`Priority-Type`,Gender)
    values(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssissss",$name,$mail,$address,$phno,$date,$bloodgroup,$priority,$gender);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>