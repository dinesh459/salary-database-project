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
$NAME=$_POST["NAME"];
$EMPLOYEE_ID=$_POST["EMPLOYEE_ID"];
$AGE=$_POST["AGE"];
$GENDER=$_POST["r1"];
$ADDRESS=$_POST["ADDRESS"];
$PHONENO=$_POST["PHONENO"];
$DEPARTMENT_ID=$_POST["DEPTNO"];
$DEPARTMENTLOCATION=$_POST["DEPARTMENTLOCATION"];
$DOJ=$_POST["DOJ"];
$DESIGNATION=$_POST["DESIGNATION"];
$BASICSALARY=$_POST["BASICSALARY"];
//$x="select dept_ID from department where D_NAME='".$DEPT_NAME."';";
//$a=mysqli_query($dbname,$x);
//$ID=mysqli_fetch_array($a,MYSQLI_BOTH);
$sql ="insert into employee(employee_id,employee_name,age,gender,address,phone_no) values ("."'".$EMPLOYEE_ID."','".$NAME."','".$AGE."','".$GENDER."','".$ADDRESS."','".$PHONENO."');";
//$sq11="insert into employee_office (employee_id,employee_name,department_id,department_location,dateofjoin,designnation) values ("."'".$EMPLOYEE_ID."','".$NAME."','".$DEPARTMENT_ID."','".$DEPARTMENTLOCATION."','".$DOJ."','".$DESIGNATION."');";
//salary calculations on basic salary
$DA           = ($BASICSALARY) * 0.2 ;
$HRA          = ($BASICSALARY) * 0.1 ;
$gross_salary = $BASICSALARY + $DA + $HRA ;
$tax          = ($gross_salary) * 0.1;
$net_salary   = $gross_salary - $tax ;
if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully for Employee Table";
}
else {
    echo "record not added succesfully on employee table";
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql2="insert into employee_salary (employee_id,basic_salary,DA,HRA,gross_salary,tax,net_salary) values ("."'".$EMPLOYEE_ID."','".$BASICSALARY."','".$DA."','".$HRA."','".$gross_salary."','".$tax."','".$net_salary."');";
if ($conn->query($sql2) === TRUE) {
    //echo "New record created successfully for EmployeeOffice Table";
}
else {
    echo "record not added succesfully on employee table";
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
$sql1="insert into employee_office (employee_id,employee_name,department_id,department_location,dateofjoin,designation) values ("."'".$EMPLOYEE_ID."','".$NAME."','".$DEPARTMENT_ID."','".$DEPARTMENTLOCATION."','".$DOJ."','".$DESIGNATION."');";
if ($conn->query($sql1) === TRUE) {
    echo "New record created successfully";
    header("location:adminpage.php");
}
else {
    echo "record not added succesfully on employee table";
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$conn->close();
?>
