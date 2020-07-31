<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart-Schooling</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        <a class="nav-link" href="index.php"><p class="navy">Home</p> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item righty">
        <a class="nav-link" href="logout.php"><button type="button" class="btn btn-dark">logout</button></a>
      </li>
    </ul>
    
  </div>
</nav>
<div class="push">
    <h1>Enter your records</h1>
<form action="student_insert.php" method="post">

    <label for="student_id">Student Id : </label>
    <input type="text" name="student_id" id="student_id" placeholder="eg.175333" />
    <label for="activity">activity : </label>
    <input type="text" name="activity" id="act" placeholder="your participation">

    <br><br>

    <label for="certificate">Certificate : </label>
    <input type="text" name="certificate" id="certificate" placeholder="eg.NPTEL" />
    <label for="internship">internship : </label>
    <input type="text" name="internship" id="internship" placeholder="eg.Microsoft"/>
    <br><br>

    <input type="submit" value="Submit">

    <br><br>

</form>
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
if(isset($_POST['student_id'])){
$link = mysqli_connect("localhost", "id11213843_wt_proj", "Manav@123","id11213843_wt_proj");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

 
// // Escape user inputs for security
$activity = mysqli_real_escape_string($link, $_REQUEST['activity']);
$certi = mysqli_real_escape_string($link, $_REQUEST['certificate']);
$internship = mysqli_real_escape_string($link, $_REQUEST['internship']);
$student_id = mysqli_real_escape_string($link, $_REQUEST['student_id']);
// Attempt insert query execution
$sql = "INSERT INTO personal_data (student_id, activity, certificate, intership) VALUES ('$student_id', '$activity', '$certi', '$internship')";
if(mysqli_query($link, $sql)){
    //echo "Records added successfully.";
    echo "<script>alert('Records added successfully!');</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}
?>