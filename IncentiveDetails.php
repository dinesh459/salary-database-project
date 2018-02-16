<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!DOCTYPE html>
 <html>
   <head>
        <title>IncentiveDetails</title>
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
     <h1 style="text-align:center">Incentive Details</h2>
	 <table>
	 <th>Empolyee_ID</th><th>Incentive</th><th>BonusAmount</th>
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
$query="select * from incentives";
$s1=mysqli_query($conn,$query);

         while($row=mysqli_fetch_array($s1))
{
echo "<tr>";
echo "<td>".$row[0]."</td>"."<td>".$row[1]."</td>"."<td>".$row[2]."</td>";	
}
echo "</table>";
         $conn->close();
         ?>   <h3></h3>
	 <h3><a href='AddIncentiveForm.html'>ADDIncentive entry for employee</a><h3>
     <h3><a href='DeleteIncentiveRecord.html'>DeleteIncentive entry for employee</a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href='UpdateIncentiveRecord.html'>UpdateIncentive entry for employee</a><h3>

	 <h3><a href='adminpage.php'>ADMINPAGE</a><h3>
   </body>
  </html>