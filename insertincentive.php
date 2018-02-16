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
$Employee_Id=$_POST["Empolyee_Id"];
$EMPLOYEE_ID=$_POST["Incentive"];
$AGE=$_POST["BonusAmount"];
$sql ="insert into incentives(employee_id,incentive,bonusamount) values ("."'".$Employee_Id."','".$Incentive."','".$BonusAmount."');";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
echo "<a href='IncentiveDetails.php'>Incentives</a>";
?>