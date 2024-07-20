<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Table</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;600&display=swap');
*{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family:'Kanit', sans-serif;
}
body{
    position: relative;
}
.top{
    height: 110px;
    background-color: #222f3e;
    padding: 0px 20px;
}
.top img{
    height: 75px;
    width: 80px;
    margin-top: 15px;
    margin-left:20px;
}
.top button{
    float: right;
    margin-top: 30px;
    margin-right: 25px;
    padding:10px 25px;
    font-size:20px;
    font-weight: bold;
    outline: none;
    border: none;
    border-radius: 25px;
}
.navbarr{
    width: 100%;
    position: relative;
    height: auto;
    background-color: #ff3838;
}
.navbarr ul a{
    text-decoration: none;
    color: aliceblue;
    font-size: 25px;
    margin-left: 0px;
}
.navbarr ul{
    display: flex;
    list-style-type: none;
    margin-left:50px;
    padding-top:10px;
    font-weight: 300;
}
.navbarr ul li{
    margin-left:30px;
}
.navbarr ul li a:hover{
    color:cyan;
}
.head1{
    background-color:#222f3e;
    text-align: center;
    font-weight: bold;
    margin-top:20px;
    padding:5px;
    color:white;
}
#table1{
    margin-top: 30px;
    position: relative;
    width: 85%;
    border:none;
    margin-left:130px;
}
footer{
    width: 100%;
    height: 430px;
    background-color: #222f3e;
    margin-top: 40px;
}
.foot{
    width: 80%;
    margin-left: 130px;
    height:430px;
    margin-top: 80px;
}
.foot img{
    height: 100px;
    width: 100px;
    margin-top: 100px;
    margin-bottom: 50px;
}
.foot .span1,.span2,.span3{
    font-size: 30px;
    font-weight: 600;
    padding: 50px;
    top: -20px;
    left: 80px;
    position: relative;
    color: white;
}
.foot a{
    text-decoration: none;
}
.foot i{
    padding: 0px 10px;
    margin-left: 80px;
    margin-top: 30px;
    transition-property: color;
    transition-duration: 0.7s;
    transition-timing-function:ease;
    color:black;
    cursor: pointer;
}
.foot i:hover{
    color: white;
    transition: ease-in;
}
.foot .copy{
    font-size: 18px;
    color: white;
    font-weight: bold;
    text-align: center;
    padding-top: 25px;
}
.foot .copy span{
    color:#ff3838;
}
    </style>
</head>
<body>
    <div class="top">
        <img src="images/logo.png" > 
        <button class="topbtn1 btn-danger">SIGN UP</button> 
        <button class="topbtn2 btn-outline-danger">LOGIN</button> 
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
    </tr></thead>
    <tbody>
        <tr>
        <?php

            //database connection

        $conn=new mysqli('localhost','root','','test');
        if($conn -> connect_error)
        {
            die("Couldn't connect.".$conn -> connect_error);
        }
        //Donor table
        $query="SELECT * FROM donor_details WHERE status='approved'";
        $result=mysqli_query($conn,$query);
        
        if (mysqli_num_rows($result) > 0) {

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
		</tr>	
		<?php
		}
        }
        else {
            echo "No approved donor data.";
        }						
		?>
        </tr>
    </tbody>
</table>

<?php 

?>


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


    <script src="regi.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>