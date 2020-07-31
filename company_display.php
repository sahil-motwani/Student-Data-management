
<?php 
$servername = "localhost";
$username = "id11213843_wt_proj";
$password = "Manav@123";
$db = "id11213843_wt_proj";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stu_id = $_POST['student_id'];
$sql = "SELECT month, percentage FROM stu_att where student_id = ".$stu_id;
$result = $conn->query($sql);
$disp_data = '';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $disp_data .= "{ month:'".$row["month"]."', percentage:".$row["percentage"]."}, ";
    }
} else {
    echo "0 results";
}

$sql = "SELECT pointer, sem FROM stu_grade where student_id = ".$stu_id;
$resultm = $conn->query($sql);

$disp_grade = '';
if ($resultm->num_rows > 0) {
    // output data of each row
    while($row = $resultm->fetch_assoc()) {
        $disp_grade .= "{ sem:'".$row["sem"]."', pointer:".$row["pointer"]."}, ";
    }
} else {
    echo "0 results";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <meta charset="UTF-8">
    <title>Smart-Schooling</title>
    <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">


</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2E69EE;">
  <a class="navbar-brand" href="index.php"><p class="navy">Smart-Schooling</p></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
    <h2>Monthly Attendance</h2>
   <div class="grade" id="chart">
   </div>
<div class="contain">
    <div class="certi">
      
    <div class="card" style="width: 100%;">
    <div class="card-header">
      Certificates
    </div>
    <ul class="list-group list-group-flush">
      <?php

      $query = "SELECT * FROM personal_data WHERE student_id = ".$stu_id;
      $resultc = $conn->query($query);
      while($row = $resultc->fetch_assoc())
      {   
        echo '<li class="list-group-item">'.$row["certificate"].'</li>';
      }

      ?>
    </ul>
    </div>

    </div>
    <div class="internships">
      
      <div class="card" style="width: 100%;">
    <div class="card-header">
      Internships
    </div>
    <ul class="list-group list-group-flush">
      <?php

      $query = "SELECT * FROM personal_data WHERE student_id = ".$stu_id;
      $resultc = $conn->query($query);
      while($row = $resultc->fetch_assoc())
      {   
        echo '<li class="list-group-item">'.$row["intership"].'</li>';
      }

      ?>
    </ul>
    </div>

    </div>
</div>
   <h2>Semester Pointer</h2>
   <div class="grade" id = "chartgrade"></div>
   <div class="grade">
      
  <div class="card" style="width: 100%;">
    <div class="card-header">
      Activities Performed
    </div>
    <ul class="list-group list-group-flush">
      <?php

      $query = "SELECT * FROM personal_data WHERE student_id = ".$stu_id;
      $resultc = $conn->query($query);
      while($row = $resultc->fetch_assoc())
      {   
        echo '<li class="list-group-item">'.$row["activity"].'</li>';
      }

      ?>
    </ul>
    </div>

   </div>

    <footer>
  <address>collector colony <br>VESIT PARK <br>Mumbai -400001</address>
   <h5 class="right">connect us on</h5><br><br><br>
   <img class="ime" src="images/facebook.png" alt="facebook">  &nbsp;
   <img class="ime" class="ime" src="images/insta.png" alt="instagram">  &nbsp; 
   <img class="ime" src="images/linkedin.png" alt="linkedin">  &nbsp; 
   <img class="ime" src="images/twitter.jpg" alt="twitter">  &nbsp; 
   <img class="ime" src="images/youtube.png" alt="youtube">
    <p id="copyright">Copyright 2019 - all rights reserved<br>made in India</p>
</footer>


</body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $disp_data; ?>],
 xkey:'month',
 ykeys:['percentage'],
 labels:['Percentage'],
 hideHover:'auto',
 stacked:true
});

Morris.Bar({
 element : 'chartgrade',
 data:[<?php echo $disp_grade; ?>],
 xkey:'sem',
 ykeys:['pointer'],
 labels:['Pointer'],
 hideHover:'auto',
 stacked:true
});

</script>
<?php 
mysqli_close($conn);
?>