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
     <h1 style="text-align:center">SALARY SLIP </h1>
	 <table>
         <th>Emp_ID</th><th>Emp_Name</th><th>Phone_NO</th><th>DepartmentNO</th><th>Department_Name</th><th>Location</th>
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
         $employee_id = $_POST["employee_id"];
$query="select e.employee_id,e.employee_name,e.phone_no from employee e where e.employee_id = '" . $employee_id . "'";
$s1=mysqli_query($conn,$query);

         while($row=mysqli_fetch_array($s1))
{
echo "<tr>";
echo "<td>".$row[0]."</td>"."<td>".$row[1]."</td>"."<td>".$row[2]."</td>";	
}
         $query1 = " select* FROM employee_office o where o.employee_id = '" . $employee_id . "'";
          $sql1 = mysqli_query($conn,$query1);
         while($row1 = mysqli_fetch_array($sql1))
          {   	
              echo  "</td>"."<td>".$row1[2]."</td>"; 
              if($row1[2]==1){
                  echo   "<td>"."HumanResource"."</td>";
              }
             elseif($row1[2]==3){
                 echo   "<td>Finance & Marketing</td>";
             }
              elseif($row1[2]==2){
                 echo   "<td>RESEARCH &DEVELOPMENT</td>";
             }
             else{
                 
             }
             echo  "<td>".$row1[3]."</td>"."</tr>";                                     
         }
echo "</table>";
         echo "<table>";
         echo "<th>SALARY_DETAILS</th><th>&nbsp&nbsp&nbsp</th><th>&nbsp&nbsp&nbsp</th><th>&nbsp&nbsp&nbsp</th>";
         $salary = 0;
          $query2 = " select* FROM employee_salary o where o.employee_id = '" . $employee_id . "'";
          $sql2 = mysqli_query($conn,$query2);
         while($row2 = mysqli_fetch_array($sql2))
          {
              echo"<tr>"."<td>"."BASIC_SALARY"."</td>"."<td>".$row2[1]."</td>"."</tr>";                                                           echo  "<tr>"."<td>"."D.A"."</td>"."<td>".$row2[2]."</td>"."</tr>";
              echo  "<tr>"."<td>"."H.R.A"."</td>"."<td>".$row2[3]."</td>"."</tr>";
              echo  "<tr>"."<td>"."GROSS_SALARY"."</td>"."<td>".$row2[4]."</td>"."</tr>";
              echo  "<tr>"."<td>"."TAX"."</td>"."<td>".$row2[5]."</td>"."</tr>";  
              echo  "<tr>"."<td>"."NET_SALARY"."</td>"."<td>".$row2[6]."</td>"."</tr>"; 
              if ($row2[6]!==0)
              $salary = $row2[6]; 
          }
         $incentive = 0;
         $Bonus = 0;
         $query3 = " select* FROM incentives o where o.employee_id = '" . $employee_id . "'";
          $sql3 = mysqli_query($conn,$query3);
         if (mysqli_num_rows($sql3) == 0) {
             echo "There is no Incentiverecord for the given employee_id";
             
         }
         while($row3 = mysqli_fetch_array($sql3))
          {
              echo  "<tr>"."<td>"."INCENTIVE"."</td>"."<td>".$row3[1]."</td>"."</tr>";                                                         echo  "<tr>"."<td>"."BONUSAMOUNT"."</td>"."<td>".$row3[2]."</td>"."</tr>";
             if ($row3[1] !=0)
                 $incentive =$row3[1];
             if ($row3[2] !=0)
                 $bonus =$row3[2];
          }
         $total = $salary+$incentive+$Bonus;
         echo  "<tr>"."<td>"."TOTAL_SALARY IN THE HANDS"."</td>"."<td>".$total."</td>"."</tr>"; 
         echo "</table>";
         $conn->close();
?>	 
   </body>
  </html>
  <a href='employeepage.html'>click here for employee page </a><br>
	 <h5><a href='SalarySlip.html'>Go Back<h5>