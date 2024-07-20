<?php

//database connection

$conn=new mysqli('localhost','root','','test');
if($conn -> connect_error)
{
	die("Couldn't connect.".$conn -> connect_error);
}
//Donor table
$query="select * from donor_details";
$result=mysqli_query($conn,$query);
//Donator table
$query1="select * from  `donator-details`";
$result1=mysqli_query($conn,$query1);
//user table
$query2="select * from signup";
$result2=mysqli_query($conn,$query2);

//Blood Needer Table
$query3="select * from patient_details";
$result3=mysqli_query($conn,$query3);

//Feedback Details
$query4="select * from feedback";
$result4=mysqli_query($conn,$query4);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>ADMIN</title>
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
<h1 class="mainhead">ADMIN PAGE</h1>
<div class="container-fluid-lg space">
<div class="row m-0 p-2">
    <div class="col-lg-2" id="donor">
        <img src="images/donor.png" alt="" class="img-fluid">
        <h3 class="left">Donor Details</h3>
    </div>
    <div class="col-lg-2" id="donator">
        <img src="images/donator.png" alt="" class="img-fluid">
        <h3>Donator</h3>
    </div>
    <div class="col-lg-2" id="feed">
        <img src="images/feed.png" alt="" class="img-fluid">
        <h3 class="left">User FeedBack</h3>
    </div>
    <div class="col-lg-2" id="needer">
        <img src="images/needer.png" alt="" class="img-fluid">
        <h3>Needer Details</h3>
    </div>
    <div class="col-lg-2" id="user">
        <img src="images/user.png" alt="" class="img-fluid">
        <h3>User Details</h3>
    </div>
</div>
<!--<iframe height="" width="100%" name="table"></iframe>-->
</div>

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
        <th>State</th>
        <th>Gender</th>
        <th>Status</th>
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
			<td><?php echo $row['State']?></td>
			<td><?php echo $row['Gender']?></td>
            <td><form action="admin.php" method="POST">
                <input type="hidden" name="name" id="id" value='<?php echo $row['Name']?>'>
                <input id="green" type="submit" name="approve" value="Approve">
                <input id="red" type="submit" name="deny" value="Deny">
            </form></td>
		</tr>	
		<?php
		}
									
		?>
        </tr>
    </tbody>
</table>

<?php 


if (isset($_POST['approve'])) {
    $name = $_POST['name'];
    $updateQuery = "UPDATE donor_details SET status='approved' WHERE Name='$name'";
    $res = mysqli_query($conn, $updateQuery);
    if ($res) {
        echo '<script type="text/javascript">';
        echo 'alert("Donor Was Approved By Admin!")';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to approve donor")';
        echo '</script>';
    }
    echo '<script>window.location.href="admin.php";</script>';
}

if (isset($_POST['deny'])) {
    $name = $_POST['name'];
    $deleteQuery1 = "DELETE FROM donor_details WHERE Name='$name'";
    //$deleteQuery2 = "DELETE FROM donortable WHERE Name='$name'";
    $res1 = mysqli_query($conn, $deleteQuery1);
    //$res2 = mysqli_query($conn, $deleteQuery2);
    if ($res1) {
        echo '<script type="text/javascript">';
        echo 'alert("Donor Denied and Data is Deleted!!!")';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to deny donor or delete data")';
        echo '</script>';
    }
    echo '<script>window.location.href="admin.php";</script>';
}
    
?>

<!--Donator Details-->

<table class="table table-responsive table-bordered" id="table2">
    <h1 class="head2">Donator Details</h1>
    <thead><tr>
        <th>Name</th>
        <th>Email</th>
        <th>PhoneNo</th>
        <th>City</th>
        <th>State</th>
        <th>Country</th>
        <th>Amount</th>
    </tr></thead>
    <tbody>
        <tr>
        <?php
			while($row=mysqli_fetch_assoc($result1))
		{
		?>
		    <td><?php echo $row['Name']?></td>
			<td><?php echo $row['Email']?></td>
			<td><?php echo $row['Number']?></td>
			<td><?php echo $row['City']?></td>
            <td><?php echo $row['State']?></td>
			<td><?php echo $row['Country']?></td>
            <td><?php echo $row['Amount']?></td>
		</tr>	
		<?php
		}
									
		?>
        </tr>
    </tbody>

</table>

<!--User Details-->

<table class="table table-bordered table-responsive" id="table3">
    <h1 class="head3">User Details</h1>
    <thead><tr>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
    </tr></thead>

    <tbody>
        <tr>
        <?php
			while($row=mysqli_fetch_assoc($result2))
		{
		?>
		    <td><?php echo $row['Name']?></td>
			<td><?php echo $row['Email']?></td>
			<td><?php echo $row['Password']?></td>
		</tr>	
		<?php }
        ?>
        </tr>
    </tbody>
</table>

<!--BloodNeeder Details-->

<table class="table table-bordered table-responsive" id="table4">
            <h1 class="head4">Blood Needer Details</h1>

    <thead><tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>PhoneNo</th>
            <th>Date</th>
            <th>Bloodgroup</th>
            <th>Priority</th>
            <th>Gender</th>
    </tr></thead>
            <tbody>
                <tr><?php
                while($row=mysqli_fetch_assoc($result3))
                { ?>
                <td><?php echo $row['Name']?></td>
                <td><?php echo $row['Email']?></td>
                <td><?php echo $row['Address']?></td>
                <td><?php echo $row['Phone-No']?></td>
                <td><?php echo $row['Date']?></td>
                <td><?php echo $row['Bloodgroup']?></td>
                <td><?php echo $row['Priority-Type']?></td>
                <td><?php echo $row['Gender']?></td>
                </tr>
                <?php } ?>
            </tbody>

</table>

<!--FeedBack Details-->

<table class="table table-bordered table-responsive" id="table5">
    <h1 class="head5">User Details</h1>
    <thead><tr>
        <th>Name</th>
        <th>Email</th>
        <th>FeedBack</th>
    </tr></thead>
    <tbody>
        <tr>
        <?php
			while($row=mysqli_fetch_assoc($result4))
		{
		?>
		    <td><?php echo $row['Name']?></td>
			<td><?php echo $row['Email']?></td>
			<td><?php echo $row['Feedback']?></td>
		</tr>	
		<?php }
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
    <script src="jquery.js"></script>
    <script src="admin.js"></script>
    <!---  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>--->
</body>
</html>