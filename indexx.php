<?php 

//database connectiviity
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="main.js"></script>
    <title>Main Page</title>
</head>
<body>
<div class="top">
        <a href="indexx.php"><img src="images/logo.png"></a> 
        <button class="topbtn1 btn-danger"><a href="register.html" class="nav-link" style="color:#fff;">SIGN UP</a></button> 
        <button class="topbtn2"><a href="login.html" class="nav-link">LOGIN</a></button> 
</div>
<div class="navbarr">
    <ul>
        <li class="nav-item"><a href="indexx.php" class="nav-link">HOME</a></li>
        <li class="nav-item"><a href="#box" class="nav-link">BLOOD BANK</a></li>
        <li class="nav-item"><a href="req.html" class="nav-link">BLOOD REQUEST</a></li>
        <li class="nav-item"><a href="#compat" class="nav-link">HELP</a></li>
        <li class="nav-item"><a href="donor.html" class="nav-link">CONTACT US</a></li>
    </ul>



<div class="color">
        <form class="admin" id="form">
            <div class="ad">
            <h1 text-align="center">ADMIN</h1>
            <div class="fgroup">
            <i style="font-size:34px" id="sa1" class="fa sa">&#xf007;</i><input type="text" name="name" id="name" class="name" data-name="Admin Name" placeholder="ADMIN NAME">
            <p></p>
            </div>
            <div class="fgroup">
            <i style="font-size:34px" id="sa2" class="fa sa">&#xf023;</i><input type="password" id="password" data-name="Admin Password" name="name" class="name" placeholder="PASSWORD">
            <p></p>
            </div>
            <button class='glowing-btn'><span class='glowing-txt'>L<span class='faulty-letter'>O</span>G</span></button>
    
          <!---<button type="SUBMIT" class="btn btn-outline-success" >LOG</button>--->
            </div>
        </form>
</div>


    <div class="div0">
        <div class="div1">
        <a href="donator.html"><img src="images/donator.png"></a>
        <h2 align="center" ><a href="donator.html">DONATE US</a></h2>
        </div>
        <div class="div2">
        <a href="donor.html"><img src="images/join.png"></a>
            <h2 align="center"><a href="donor.html">JOIN US</a></h2>
        </div>
        <div class="div3">
        <a href="feed.html"><img src="images/ff.png"></a>
            <h2 align="center"><a href="feed.html">FEEDBACK</a></h2>
        </div>
    </div>
</div>


<button id="backToTopBtn" onclick="scrollToTop()"><i style="font-size:24px" class="fa">&#xf139;</i></button>

<div class="comp">
<div class="type">
    <h2>Compatible Blood Type Donors</h2>
    <table class="table">
        <tr>
        <th>Blood Type</th>
        <th>Donate Blood To</th>
        <th>Receive Blood From</th>
        </tr>
        <tr>
            <td>A+</td>
            <td>A+ AB+</td>
            <td>A+ A- O+ O-</td>
        </tr>
        <tr>
            <td>O+</td>
            <td>O+ A+ B+ AB+</td>
            <td>O+ O-</td>
        </tr>
        <tr>
            <td>B+</td>
            <td>B+ AB+</td>
            <td>B+ B- O+ O-</td>
        </tr>
        <tr>
            <td>AB+</td>
            <td>AB+</td>
            <td>Everyone</td>
        </tr>
        <tr>
            <td>A-</td>
            <td>A+ A- AB+ AB-</td>
            <td>A- O-</td>
        </tr>
        <tr>
            <td>O-</td>
            <td>Everyone</td>
            <td>O-</td>
        </tr>
        <tr>
            <td>B-</td>
            <td>B+ B- AB+ AB-</td>
            <td>B- O-</td>
        </tr>
        <tr>
            <td>AB-</td>
            <td>AB+ AB-</td>
            <td>AB- A- B- O-</td>
        </tr>
    </table>
</div>
<div class="mes">
    <img src="images/donoo.jpg">
    <h4>One <span style="color:red";><b>Blood</b></span> Donation can <span style="color:red";><b>Save</b></span> upto Three <span style="color:red";><b>Lives</b></span></h4>
    <p>After donating blood, the body works to replenish the blood loss. This <br>stimulates the production of new blood cells and in turn, helps in<br> maintaining good health.</p>
</div>
</div>




<div class="box" id="box">
<p>TOTAL <span style="color:red";><b>BLOOD</b></span> DONOR REGISTER WITH BLOOD <span style="color:red";><b>BANK</b></span> TODAY</p>
<h3 id="blood">ALL BLOOD GROUP LIST</h3>
<div class="mbox">
    <div class="box-1"><img src="images/oo.png" alt="O+"><br>


    <?php 
    $blood1_value="SELECT * FROM `donor_details` WHERE Bloodgroup='O+'";
    $blood1_run=mysqli_query($conn,$blood1_value);
    if($total1=mysqli_num_rows($blood1_run)){
        echo '<p>'.$total1.'</P>';
    }
    else{
        echo '<p>No Data</p>';
    }
?>


</div>
    <div class="box-2"><img src="images/aa.png" alt="A+"><br>
    <?php 
    $blood2_value="SELECT * FROM `donor_details` WHERE Bloodgroup='A+'";
    $blood2_run=mysqli_query($conn,$blood2_value);
    if($total2=mysqli_num_rows($blood2_run)){
        echo '<p>'.$total2.'</P>';
    }
    else{
        echo '<p>No Data</p>';
    }
?>
    </div>
    <div class="box-3"><img src="images/bb.png" alt="B+"><br>
    <?php 
    $blood3_value="SELECT * FROM `donor_details` WHERE Bloodgroup='B+'";
    $blood3_run=mysqli_query($conn,$blood3_value);
    if($total3=mysqli_num_rows($blood3_run)){
        echo '<p>'.$total3.'</P>';
    }
    else{
        echo '<p>No Data</p>';
    }
?>
    </div>
    <div class="box-4"><img src="images/abab.png" alt="AB+"><br>
    <?php 
    $blood4_value="SELECT * FROM `donor_details` WHERE Bloodgroup='AB+'";
    $blood4_run=mysqli_query($conn,$blood4_value);
    if($total4=mysqli_num_rows($blood4_run)){
        echo '<p>'.$total4.'</P>';
    }
    else{
        echo '<p>No Data</p>';
    }
?>
</div>
    <div class="box-5"><img src="images/o.png" alt="O-"><br>
    <?php 
    $blood5_value="SELECT * FROM `donor_details` WHERE Bloodgroup='O-'";
    $blood5_run=mysqli_query($conn,$blood5_value);
    if($total5=mysqli_num_rows($blood5_run)){
        echo '<p>'.$total5.'</P>';
    }
    else{
        echo '<p>No Data</p>';
    }
?>
</div>
    <div class="box-6"><img src="images/a.png" alt="A-"><br>
    <?php 
    $blood6_value="SELECT * FROM `donor_details` WHERE Bloodgroup='A-'";
    $blood6_run=mysqli_query($conn,$blood6_value);
    if($total6=mysqli_num_rows($blood6_run)){
        echo '<p>'.$total6.'</P>';
    }
    else{
        echo '<p>No Data</p>';
    }
?>
    </div>
    <div class="box-7"><img src="images/b.png" alt="B-"><br>
    <?php 
    $blood7_value="SELECT * FROM `donor_details` WHERE Bloodgroup='B-'";
    $blood7_run=mysqli_query($conn,$blood7_value);
    if($total7=mysqli_num_rows($blood7_run)){
        echo '<p>'.$total7.'</P>';
    }
    else{
        echo '<p>No Data</p>';
    }
?>
    </div>
    <div class="box-8"><img src="images/ab.png" alt="AB-"><br>
    <?php 
    $blood8_value="SELECT * FROM `donor_details` WHERE Bloodgroup='AB-'";
    $blood8_run=mysqli_query($conn,$blood8_value);
    if($total8=mysqli_num_rows($blood8_run)){
        echo '<p>'.$total8.'</P>';
    }
    else{
        echo '<p>No Data</p>';
    }
?>
</div>
</div>
</div>
<button id="btn"><span class="layer"></span>BE A DONOR</button>

<div class="m-box">
    <div class="box1"></div>
    <div class="box2">
        <h1 style="text-align: center;">Why Should Donate Blood?</h1>
        <p class="para">
        Donating blood regularly is beneficial to prevent and reduce heart attacks and liver ailment.
        The risk of heart and liver related problem is caused by the iron overload in the body. Donating blood helps in maintaining the iron level in the body and thus reduce those risk. Cancer is the most feared and deadly disease.
        Why is it important to donate blood?
        Blood is the most precious gift that anyone can give to another person the gift of life. A decision to donate your blood can save a life, or even several if your blood is separated into its components – red cells, platelets and plasma – which can be used individually for patients with specific conditions. 
        </p>
    </div>
</div>


<div class="types">

<h2>TYPES OF DONATION</h2>

<p id="mss">The human body contains five liters of blood, which is made of several useful components i.e. Whole blood, Platelet, and Plasma.
<br>Each type of component has several medical uses and can be used for different medical treatments. your blood donation determines the best donation for you to make.
For plasma and platelet donation you must have donated whole blood in past two years.</p>


<ul class="nav nav-tabs" id="myTabs">
    <li class="nav-item">
      <a class="nav-link active" href="#content1">WHOLE BLOOD</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#content2">PLASMA</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#content3">PLATELET</a>
    </li>
  </ul>

  <div class="tab-content">
    <div class="tab-pane active" id="content1">
      <div class="c1">
      <div>
        <h4>What is it?</h4>
        <p>Blood Collected straight from the donor after its donation</p>
        <p>usually separated into red blood cells, platelets, and plasma.</p>
        <h4>Who can donate?</h4>
        <p>You need to be 18-65 years old, weigh 45kg or more and be</p>
        <p>fit and healthy.</p>
      </div>
    <div>
        <h4>User For?</h4>
        <p>Stomach disease, kidney disease, childbirth, operations,</p>
        <p>blood loss, trauma, cancer, blood diseases, haemophilia,</p>
        <p>anemia, heart disease.</p>
        <h4>Lasts For?</h4>
        <p>Red cells can be stored for 42 days.</p>
    </div>
    <div class="dd">
        <h4>How long does it take?</h4>
        <p>15 minutes to donate.</p>
        <h4>How often can I donate?</h4>
        <p>Every 12 weeks</p>
    </div>
    </div>
</div>
<div class="tab-pane" id="content2">
      <div class="c1">
        <div>
            <h4>What is it?</h4>
            <p>The straw-coloured liquid in which red blood cells, white</p>
            <p>blood cells, and platelets float in.Contains special nutrients</p>
            <p>which can be used to create 18 different type of medical</p>
            <p>products to treat many different medical conditions.</p>
            <h4>Who can donate?</h4>
            <p>You need to be 18-70 (men) or 20-70 (women) years old,</p>
            <p>weigh 50kg or more and must have given successful whole</p>
            <p>blood donation in last two years.</p>
        </div>
        <div>
            <h4>User For?</h4>
            <p>Immune system conditions, pregnancy (including anti-D</p>
            <p>injections), bleeding, shock, burns, muscle and nerve</p>
            <p>conditions, haemophilia, immunisations.</p>
            <h4>Lasts For?</h4>
            <p>Plasma can last up to one year when frozen.</p>
        </div>
        <div class="dd">
            <h4>How does it work?</h4>
            <p>We collect your blood, keep plasma and return rest to you</p>
            <p>by apheresis donation.</p>
            <h4>How long does it take?</h4>
            <p>15 minutes to donate.</p>
            <h4>How often can I donate?</h4>
            <p>Every 2-3 weeks.</p>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="content3">
      <div class="c1">
        <div>
            <h4>What is it?</h4>
            <p>The tiny 'plates' in blood that wedge together to help to clot</p>
            <p>and reduce bleeding. Always in high demand, Vital for</p>
            <p>people with low platelet count, like malaria and cancer</p>
            <p>patients.</p>
            <h4>Who can donate?</h4>
            <p>You need to be 18-70 years old (men), weigh 50kg or more</p>
            <p>and have given a successful plasma donation in the past 12</p>
            <p>months</p>
        </div>
        <div>
            <h4>User For?</h4>
            <p>Cancer, blood diseases, haemophilia, anaemia, heart disease,</p>
            <p>stomach disease, kidney disease, childbirth, operations,</p>
            <p>blood loss, trauma, burns.</p>
            <h4>Lasts For?</h4>
            <p>Just five days..</p>
        </div>
        <div class="dd">
            <h4>How does it work?</h4>
            <p>We collect your blood, keep platelet and return rest to you</p>
            <p>by apheresis donation.</p>
            <h4>How long does it take?</h4>
            <p>45 minutes to donate.</p>
            <h4>How often can I donate?</h4>
            <p>Every 2 weeks</p>
        </div>
      </div>
    </div>
</div>

</div>

<div class="last">
    <p>YOU ARE THE REASON TO <br> MAKE SOMEONE HAPPY!</p>
</div>
<footer>
<div class="foot">
    <img src="images/logo.pn">
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
<script>
var uname=document.getElementById('name');
var password=document.getElementById('password');
var form=document.getElementById('form');
var sa1Icon = document.getElementById('sa1');
  var sa2Icon = document.getElementById('sa2');

  uname.addEventListener('focus', function () {
    sa1Icon.style.display = 'none';
  });

  uname.addEventListener('blur', function () {
    sa1Icon.style.display = 'inline-block';
  });

  password.addEventListener('focus', function () {
    sa2Icon.style.display = 'none';
  });

  password.addEventListener('blur', function () {
    sa2Icon.style.display = 'inline-block';
  });

function error(input, message) {
  const fgroup = input.parentElement;
  if (fgroup) {
    fgroup.className = "fgroup error";
    const p = fgroup.querySelector('p');
    if (p) {
      p.innerHTML = message;
    }
  }
}

 function success(input){
     const fgroup=input.parentElement;
     fgroup.className="fgroup success";
     const p=fgroup.querySelector('p');
     p.innerHTML="";
 }

 function checkvalue(inputs){
    let valid=true;
    inputs.forEach((input) => {
        if(input.value.trim()==""){
            error(input,`${getname(input)} is required`);
            valid=false;
        }
        else{
            success(input);
        }
    });
    return valid;
}
function getname(input){
   return input.getAttribute('data-name');
}

function name(input){
    if(input.value === "Kingshlin"){
        success(input);
        return true;
    }
    else{
        error(input,"Incorrect Username");
        return false;
    }
    return false;
}

function pass(input){
    if(input.value === "kingsvershis"){
        success(input);
        return true;
    }
    else{
        error(input,"Incorrect Password");
        return false;
    }
    return false;
}

function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }

    // Show or hide the button based on scroll position
    window.addEventListener('scroll', function() {
      var backToTopBtn = document.getElementById('backToTopBtn');
      if (window.pageYOffset > 300) {
        backToTopBtn.style.display = 'block';
      } else {
        backToTopBtn.style.display = 'none';
      }
    });

form.addEventListener("submit",function(e){
    e.preventDefault();
    var one = checkvalue([uname,password]);
    var two = name(uname);
    var three =pass(password);
    console.log(one,two,three);
    if(one && two && three){
        window.location.href="admin.php";
    }
});

$(document).ready(function() {
      // Add click event listener to nav links
      $('.nav-link').on('click', function(e) {
        e.preventDefault();

        // Remove 'active' class from all nav links
        $('.nav-link').removeClass('active');

        // Add 'active' class to the clicked nav link
        $(this).addClass('active');

        // Get the target content ID from the href attribute
        var targetID = $(this).attr('href');

        // Show the corresponding content pane
        $('.tab-pane').removeClass('active');
        $(targetID).addClass('active show');
      });
    });

</script>
</body>
</html>

