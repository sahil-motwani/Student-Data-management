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
      </li>
      <li class="nav-item righty">
        <a class="nav-link" href="logout.php"><button type="button" class="btn btn-dark">logout</button></a>
      </li>

    </ul>
    
  </div>
</nav>
<div class="push">
    <h1>Enter student's Grade</h1>
<form action="" method="post">

    
    <label for="student_id">Student Id : </label>
    <input type="text" name="student_id" id="student_id" placeholder="eg.175333" />

    <br><br>

    <label for="pointer">Pointer : </label>
    <input type="Phone" name="pointer" id="pointer">

    <br><br>

    <select id='sem' name="sem">
    <option value=''>--Select SEM--</option>
    <option value='SEM I'>I</option>
    <option value='SEM II'>II</option>
    <option value='SEM III'>III</option>
    <option value='SEM IV'>IV</option>
    <option value='SEM V'>V</option>
    <option value='SEM VI'>VI</option>
    <option value='SEM VII'>VII</option>
    <option value='SEM VIII'>VIII</option>
    </select>

    <input type="submit" value="Submit">

    <br><br>

</form>
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
$stu_id = mysqli_real_escape_string($link, $_REQUEST['student_id']);
$pointer = mysqli_real_escape_string($link, $_REQUEST['pointer']);
$sem = mysqli_real_escape_string($link, $_REQUEST['sem']);

// Attempt insert query execution
$sql = "INSERT INTO stu_grade (student_id, pointer, sem) VALUES ('$stu_id', '$pointer', '$sem')";
if(mysqli_query($link, $sql)){
  echo "<script type='text/javascript'>alert('Records added successfully!');</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}
?>