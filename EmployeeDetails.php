 <html>
   <head>
        <title>Details of Empolyee</title>
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
     <h1 style="text-align:center">DETAILS OF EMPLOYEE</h1>
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
          $employee_id = $_POST["employee_id"];
          $query = " select* FROM employee e where e.employee_id = '" . $employee_id . "'";
          $sql = mysqli_query($conn,$query);
           if (mysqli_num_rows($sql) == 0) {
             echo "There is no record for the given employee_id";
           }
       else
       {
         while($row = mysqli_fetch_array($sql))
          {
              echo "<table>";
              echo "<th>"."EmployeeDetails"."</th>"."<th>".""."</th>";
              echo  "<tr>"."<td>"."EMPLOYEE_ID"."</td>"."<td>".$row[0]."</td>"."</tr>";                                                       echo  "<tr>"."<td>"."EMPLOYEE_NAME"."</td>"."<td>".$row[1]."</td>"."</tr>";
              echo  "<tr>"."<td>"."EMPLOYEE_AGE"."</td>"."<td>".$row[2]."</td>"."</tr>";
              echo  "<tr>"."<td>"."EMPLOYEE_GENDER"."</td>"."<td>".$row[3]."</td>"."</tr>";                                                       echo  "<tr>"."<td>"."EMPLOYEE_ADDRESS"."</td>"."<td>".$row[4]."</td>"."</tr>";
              echo  "<tr>"."<td>"."EMPLOYEE_PHONENO"."</td>"."<td>".$row[5]."</td>"."</tr>";
          }
         $employee_id = $_POST["employee_id"];
          $query1 = " select* FROM employee_office o where o.employee_id = '" . $employee_id . "'";
          $sql1 = mysqli_query($conn,$query1);
         while($row1 = mysqli_fetch_array($sql1))
          {   	
              echo  "<tr>"."<td>"."DEPARTMENT_ID"."</td>"."<td>".$row1[2]."</td>"."</tr>"; 
              if($row1[2]==1){
                  echo   "<tr>"."<td>"."DEPARTMENT_NAME"."</td>"."<td>HumanResource</td>"."</tr>";
              }
             elseif($row1[2]==3){
                 echo   "<tr>"."<td>"."DEPARTMENT_NAME"."</td>"."<td>Finance & Marketing</td>"."</tr>";
             }
              elseif($row1[2]==2){
                 echo   "<tr>"."<td>"."DEPARTMENT_NAME"."</td>"."<td>RESEARCH &DEVELOPMENT</td>"."</tr>";
             }
             else{
                 
             }
             echo  "<tr>"."<td>"."EMPLOYEE_DEPARTMENT_LOCATION"."</td>"."<td>".$row1[3]."</td>"."</tr>";
              echo  "<tr>"."<td>"."DATE OF JOIN"."</td>"."<td>".$row1[4]."</td>"."</tr>";
              echo  "<tr>"."<td>"."EMPLOYEE_DESIGNATION"."</td>"."<td>".$row1[5]."</td>"."</tr>";                                                 
          }
         $salary = 0;
          $query2 = " select* FROM employee_salary o where o.employee_id = '" . $employee_id . "'";
          $sql2 = mysqli_query($conn,$query2);
         while($row2 = mysqli_fetch_array($sql2))
          {
              echo  "<tr>"."<td>"."BASIC_SALARY"."</td>"."<td>".$row2[1]."</td>"."</tr>";                                                       echo  "<tr>"."<td>"."D.A"."</td>"."<td>".$row2[2]."</td>"."</tr>";
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
             echo "There is no Incentive Record for the given Employee_id";
         }
         while($row3 = mysqli_fetch_array($sql3))
          {
              echo  "<tr>"."<td>"."INCENTIVE"."</td>"."<td>".$row3[1]."</td>"."</tr>";                                                         echo  "<tr>"."<td>"."BONUSAMOUNT"."</td>"."<td>".$row3[2]."</td>"."</tr>";
             if ($row3[1] !=0)
                 $incentive =$row3[1];
             if ($row3[2] !=0)
                 $bonus =$row3[2];
          }
         $total = $salary+$incentive+$bonus;
         echo  "<tr>"."<td>"."TOTAL_SALARY"."</td>"."<td>".$total."</td>"."</tr>";
         echo "</table>";
           }
         ?>
       <h4> <a href="employeepage.html"> back to employee page</a></h4>