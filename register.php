<?php
//register.php
//Variable Declaration

//Database Connection

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);
}
else {
    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $password=$_POST['password'];
    
        //code
        $stmt = $conn->prepare("INSERT INTO signup (Name, Email, Password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $mail, $password);
        $stmt->execute();
        $stmt->close();
        $conn->close();

}
?>






<?php 
/*$select = "SELECT * FROM signup WHERE Name = '$name' or Email = 'mail' LIMIT 1";
    $result=mysqli_query($conn,$select);
    $user=mysqli_fetch_assoc($result);
    if($user){
        if($user['Name']===$name){
            ?>
            <script>
            alert ("Username already Exist");
            location
            </script>
<?php
        }
        if($user['Email']===$mail){
            ?>
            <script>
            alert ("Email already Exist");
            </script>
        <?php

        }
    }*/
?>


