<?php
// signup
$conn = mysqli_connect("localhost","id11213843_wt_proj", "Manav@123", "id11213843_wt_proj");
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
if (isset($_POST['sign'])){
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);
// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}
// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}
// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: index.php");
            echo "<script type='text/javascript'>alert('id created successfully!');</script>";
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart-Schooling</title>
    <link rel="stylesheet" href="style.css">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>
   <!-- navbar starts here -->
<!-- users is the table for signup -->
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
      <li class="nav-item active">
  <a class="nav-link" href="company_extract.php"><p class="navy">company</p> <span class="sr-only">(current)</span></a>
</li>
      <!-- button trigger for faculty login -->
<!-- Button trigger modal -->
<li class="nav-item rightm" style="float:left;">
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal_1">
  Faculty login
</button>
</li>&nbsp;
      <!-- button trigger for student login -->
      <li class="nav-item">
      <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
  Student LogIn
</button>
</li>&nbsp;
<!-- button trigger for signup -->
      <li class="nav-item" style="float:right;">
      <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal1">
  SignUp
</button>
      </li>
      <!-- Button trigger modal -->
      <!-- Modal faculty login-->
<div class="modal fade" id="exampleModal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Faculty LogIn page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="verifyfac.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">ID</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter ID" name="username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <br> <center><button type="submit" name="faculty" class="btn btn-primary" value="faculty">Submit</button></center>
</form>
      </div>
    </div>
  </div>
</div>
  <!-- login modal faculty ends -->
<!-- Modal signup-->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign Up Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container mt-4">
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username</label>
      <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Enter ID">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password">
    </div>
     <center><button type="submit" name="sign" class="btn btn-primary">Submit</button></center>
</form>
</div>
      </div>
      <!-- <div class="modal-footer">
        <a href=tp.php"><button type="button" class="btn btn-primary">Register</button></a>
      </div> -->
    </div>
  </div>
</div>
<!-- signup modal ends -->
<!-- Modal student login-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student LogIn page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="verifystu.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">ID</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter id" name="username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
 <center><button type="submit" name="student" class="btn btn-primary" value="student">Submit</button></center>
</form>
      </div>
      </div>
  </div>
  <!-- login modal students ends -->
</nav>
<!-- nav ends here -->
<div class="info">
    <h5>Know your inner potential</h5> <br>
    <h1>A powerfull all in one student <br> information management system</h1>
</div>
<div id="cover">
    <h2>WHAT SMART SCOOL COVERS</h2>
</div>
<!--carousel start-->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 thik" src="images/grading.jpeg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
     <h5 class="text">Grade tracking</h5>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 thik" src="images/certificates.png" alt="Second slide">
    <div class="carousel-caption d-none d-md-block">
     <h5 class="text">Certifications</h5>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 thik" src="images/attendance.png" alt="Third slide">
    <div class="carousel-caption d-none d-md-block">
     <h5 class="text">Attendance Records</h5>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 thik" src="images/internship.jpg" alt="First slide">
    <div class="carousel-caption d-none d-md-block">
     <h5 class="text">Internships Records</h5>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 thik" src="images/activity.jpg" alt="Second slide">
    <div class="carousel-caption d-none d-md-block">
     <h5 class="text">Activities</h5>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 thik" src="images/achievement.jpg" alt="Third slide">
    <div class="carousel-caption d-none d-md-block">
     <h5 class="text">Achievement</h5>
    </div>
    </div>
  </div>
</div>
<!--carousel end-->
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