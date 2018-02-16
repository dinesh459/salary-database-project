<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php
$servername = "localhost";
$username = "dinesh";
$password = "dinesh";
$dbname = "miniproject";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$Employee_Id=$_POST["EMPOLYEE_ID"];
$sql ="delete from incentives where employee_id = '".$Employee_Id."'";
if ($conn->query($sql) === TRUE) {
    echo "The IncentiveRecord Of Employee Whose Employee_Id is";
    echo $Employee_Id;
    echo " Deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
echo "<h4><a href='adminpage.php'>Back to AdminPage</a></h4>";
?>