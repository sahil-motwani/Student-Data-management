<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Smart-Schooling</title>
    <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2E69EE;">
  <a class="navbar-brand" href="#"><p class="navy">Smart-Schooling</p></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><p class="navy">Home</p> <span class="sr-only">(current)</span></a>
      </li>
      &nbsp;&nbsp;
      <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
      <li class="nav-item righty">
        <a class="nav-link" href="logout.php"><button type="button" class="btn btn-dark">logout</button></a>
      </li>

    </ul>
    
  </div>
</nav>
<div class="push">
    <h3>Enter Student Attendance</h3>
    <button type="button" class="btn btn-dark"><a href="enter_att.php">click here</a></button>
</div>
<div class="push">
    <h3>Enter Student Grade</h3>
    <button type="button" class="btn btn-dark"><a href="stu_grade.php">click here</a></button>
</div>
<div class="push">
    <h3>Enter Student personal details</h3>
    <button type="button" class="btn btn-dark"><a href="enter.php">click here</a></button>
</div>
<div class="push">
    <h3>Extract Student Academic details</h3>
    <button type="button" class="btn btn-dark"><a href="student_extract.php">click here</a></button>
</div>
<div class="push">
    <h3>Extract Student personal details</h3>
    <button type="button" class="btn btn-dark"><a href="extract.php">click here</a></button>
</div>
<div class="push">
    <h3>Delete Student Records</h3>
    <button type="button" class="btn btn-dark"><a href="delete.php">click here</a></button>
</div>

<footer>
  <address>collector colony <br>VESIT PARK <br>Mumbai -400001</address>
   <h5 class="right">Connect us on</h5><br><br><br>
   <img class="ime" src="images/facebook.png" alt="facebook">  &nbsp;
   <img class="ime" class="ime" src="images/insta.png" alt="instagram">  &nbsp; 
   <img class="ime" src="images/linkedin.png" alt="linkedin">  &nbsp; 
   <img class="ime" src="images/twitter.jpg" alt="twitter">  &nbsp; 
   <img class="ime" src="images/youtube.png" alt="youtube">
    <p class="copyright">Copyright @ 2019 - Designed by sahil & Manav</p>
</footer>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<?php
if(isset($_POST['first_name'])){
$link = mysqli_connect("localhost", "id11213843_wt_proj", "Manav@123","id11213843_wt_proj");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

 
// // Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$mobile = mysqli_real_escape_string($link, $_REQUEST['ph']);
$dept = mysqli_real_escape_string($link, $_REQUEST['department_id']);
$stu_id = mysqli_real_escape_string($link, $_REQUEST['student_id']);
// Attempt insert query execution
$sql = "INSERT INTO stu_data (fname, lname, email, mobile, department_id, student_id) VALUES ('$first_name', '$last_name', '$email', '$mobile', '$dept', '$stu_id')";
if(mysqli_query($link, $sql)){

    echo "<script type='text/javascript'>alert('Records added successfully!');</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}
?>