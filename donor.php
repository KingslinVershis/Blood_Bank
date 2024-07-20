<?php

//Variable Declaration

$name=$_POST['name'];
$mail=$_POST['email'];
$addr=$_POST['addr'];
$phno=$_POST['phno'];
$date=$_POST['date'];
$age=$_POST['age'];
$height=$_POST['height'];
$weight=$_POST['weight'];
$pin=$_POST['pin'];
$blood=$_POST['bloodgroup'];
$state=$_POST['state'];
$gender=$_POST['gender'];


//Database Connection

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into `Donor_details`(Name,Email,Address,`PhoneNo`,DOB,Age,Height,Weight,Pin,Bloodgroup,State,Gender)
    values(?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssisiiiisss",$name,$mail,$addr,$phno,$date,$age,$height,$weight,$pin,$blood,$state,$gender);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>