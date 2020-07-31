<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "id11213843_wt_proj";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{echo "connection success";}

// // Create database
// $sql = "CREATE DATABASE wt_lab";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

/*$sql = "CREATE TABLE stu_data (
mobile INT(15),
fname VARCHAR(30) NOT NULL,
lname VARCHAR(30) NOT NULL,
email VARCHAR(50),
student_id INT(10) PRIMARY KEY,
department_id INT(5)
)";*/
/*$sql = "CREATE TABLE personal_data (
    intership VARCHAR(30) NOT NULL,
    activity VARCHAR(30) NOT NULL,
    certificate VARCHAR(50),
    student_id INT(10) PRIMARY KEY
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table stu_data created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}*/

//$conn->close();
?>