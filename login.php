<?php
//session_start();
// Database Connection

$conn = mysqli_connect("localhost", "root", "", "test") or die("Connection Failed");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM signup WHERE (Name='$username' OR Email='$username')";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($password === $row['Password']) {
          //  $_SESSION['login'] = true;
            echo "<script>alert('Login Successfully!')</script>";
            echo "<script> window.location.href='index.php'; </script>";
        } else {
            echo "<script>alert('Wrong Password!!!')</script>";
        }
    } else {
        echo "<script>alert('User Not Found')</script>";
    }
}
//Donor table
$query="select * from donor_details";
$result=mysqli_query($conn,$query);
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <div class="top">
    <a href="index.php"><img src="images/logo.png"></a> 
        <button class="topbtn1 btn-danger"><a href="register.html" class="nav-link" style="color:#fff;">SIGN UP</a></button> 
        <button class="topbtn2"><a href="login.html" class="nav-link">LOGIN</a></button> 
</div>
<nav class="navbarr navbar navbar-expand-sm">
    <div class="container-fluid-lg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav" style="padding:10px">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
          </svg>
    </button>
    <div class="collapse navbar-collapse" id="mynav">
    <ul class="navbar-nav">
        <li class="nav-item"><a href="" class="nav-link">HOME</a></li>
        <li class="nav-item"><a href="" class="nav-link">BLOOD BANK</a></li>
        <li class="nav-item"><a href="" class="nav-link">BENEFITS</a></li>
        <li class="nav-item"><a href="" class="nav-link">HELP</a></li>
        <li class="nav-item"><a href="" class="nav-link">CONTACT US</a></li>
    </ul>
    </div>
    </div>
</nav>
    <form class="size" id="loginForm" name="login" method="post" action="login.php">
        <h1>Login Information</h1>
        <div class="bx">
        <div class="bx1">
        <div class="log">
        <div class="fgroup">
        <span>Username or Email</span><br>
        <input type="text" placeholder="Enter Your Email ID" id="username" name="username" data-name="Username or Mail"> 
        <p></p>
        </div>
        <div class="fgroup">
            <span>Password</span><br>
            <input type="password" placeholder="Enter Your Password" id="password" name="password" data-name="Password">
            <p></p>
        </div>
        </div>
        <div class="check"><input type="checkbox"><span> I Accept <span style="color:red">Terms & Conditions</span></span></div>
  <!--  <input type="submit" value="SUBMIT" class="sub">--> 
  <button class="sub" type="submit" id="save" name="save">LOGIN</button>
</div>
<div class="bx2">
    <p>New Here ?</p>
<h2>Signup For Create Your Own<h2>
    <h2 style="text-align: center;">ACCOUNT</h2>
    <button href="register.html">Signup</button>
</div>
</div>
</form>



<!--Donor Details-->

<table class="table table-responsive table-bordered" id="table1">
    <h1 class="head1">DONOR TABLE</h1>
    <thead name="donortable"><tr>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>PhoneNo</th>
        <th>DOB</th>
        <th>Age</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Pin</th>
        <th>BloodGroup</th>
        <th>Gender</th>
    </tr></thead>
    <tbody>
        <tr>
        <?php
			while($row=mysqli_fetch_assoc($result))
		{
		?>
		    <td><?php echo $row['Name']?></td>
			<td><?php echo $row['Email']?></td>
			<td><?php echo $row['Address']?></td>
			<td><?php echo $row['PhoneNo']?></td>
			<td><?php echo $row['DOB']?></td>
            <td><?php echo $row['Age']?></td>
			<td><?php echo $row['Height']?></td>
            <td><?php echo $row['Weight']?></td>
			<td><?php echo $row['Pin']?></td>
			<td><?php echo $row['Bloodgroup']?></td>
			<td><?php echo $row['Gender']?></td>
		</tr>	
		<?php
		}
									
		?>
        </tr>
    </tbody>
</table>

<footer>
    <div class="foot">
        <img src="images/logo.png">
        <a href=""><span class="span1">ABOUT US</span></a>
        <a href=""><span class="span2">HELP</span></a>
        <a href=""><span class="span3">CONTACT US</span></a>
        <hr>
        <div>
            <i class="fa fa-github" style="font-size:38px" ></i>
            <i class="fa fa-instagram" style="font-size:38px"></i>
            <i class="fa fa-google-plus-square" style="font-size:38px"></i>
            <i class="fa fa-linkedin-square" style="font-size:38px"></i>
            <i class="fa fa-whatsapp" style="font-size:38px"></i>
            <i class="fa fa-youtube-play" style="font-size:38px"></i>
            <i class="fa fa-twitter-square" style="font-size:38px"></i>
        </div>
        <div class="copy">
            copyright &copy; 2023.All Rights Reserved By <span>KV Blood Bank</span><br>
            Design & Develop By <span>Kingshly</span> 
        </div>
    </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

