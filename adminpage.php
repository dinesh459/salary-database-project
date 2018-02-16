<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!DOCTYPE html>
 <html>
   <head>
        <title>ADMIN PAGE</title>
		<style>
		body {background-color: powderblue;}
		table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
             }

    td, th {
       border: 1px solid #dddddd;
       text-align: left;
       padding: 8px;
}

		</style>
   </head>
   <body>
     <h1 style="text-align:center">Welcome Admin </h1>
       <h1 style="text-align:center">  SALARY DATABASE MANAGE SYSTEM</h1>
	 <h2>Empolyee List With Details</h2>
	 <table>
         <th>Emp_ID</th><th>Emp_Name</th><th>Age</th><th>Gender</th><th>Address</th><th>Phone_NO</th><th>Department_NO</th><th>Department_NAME</th><th>Location</th><th>Designation</th><th>BasicSalary</th>
	  <?php
$servername = "localhost";
$username = "dinesh";
$password = "dinesh";
$dbname = "miniproject";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
         $department = " ";
$query="select e.*,o.department_id,o.department_location,o.designation,s.basic_salary from employee e,employee_office o,employee_salary s where e.employee_id=o.employee_id and e.employee_id=s.employee_id";
$s1=mysqli_query($conn,$query);

         while($row=mysqli_fetch_array($s1))
{
echo "<tr>";
              if($row[6]==1){
                                 $department = "HumanResource";
              }
             elseif($row[6]==3){
                 $department = "Finance & Marketing";
             }
              elseif($row[6]==2){
                $department = "Research & Development";
             }
             else{
                 
             }
echo "<td>".$row[0]."</td>"."<td>".$row[1]."</td>"."<td>".$row[2]."</td>"."<td>".$row[3]."</td>"."<td>".$row[4]."</td>"."<td>".$row[5]."</td>"."<td>".$row[6]."</td>"."<td>".$department."</td>"."<td>".$row[7]."</td>"."<td>".$row[8]."</td>"."<td>".$row[9]."</td>";	
}
echo "</table>";
         $conn->close();
?>	 
	 <h2>Details Of Tables In The Database</h2>
	 <a href='DepartmentDetails.php'>Department </a><br>
	 <a href='EmployeeOfficeDetails.php'>Empolyee Office Details</a><br>
	 <a href='EmployeeSalaryDetails.php'>Details of Empolyee Salary</a><br>
	 <a href='IncentiveDetails.php'>Incentives</a>
	 <h2>To Add Empolyee and his Details click below</h2>
	 <h5><a href='AddEmployeeForm.html'>clickhere<h5>
	 <h3><a href='DeleteEmployeeRecord.html'>DeleteEmployeeRecord</a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href='UpdateEmployeeRecord.html'>UpdateEmployeeRecord</a><h3>
   </body>
  </html>