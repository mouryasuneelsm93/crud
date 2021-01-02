<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
      body {
    background-color: blanchedalmond;
}
    .table{
        
    }
    .table th{
        font-size:15px;
        background-color:rgba(100,0,0,.5);
        color:greenyellow;
    }
    .table td{
        font-size:15px;
       
    }
    .logo
    {
      font-size: 50px;
      font-weight:bold;
      text-shadow: 2px 2px red;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand logo" href="index.php" >CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <form method="post">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
          <input type="text" name="search" >
        </li>
       <li class="nav-item">&nbsp;</li>
        <li class="nav-item">
          <button class="btn btn-primary text-warning" type="submit">Search</button>
        </li>
      </ul>
</form>
    </div>
  </nav>
</body>
</html>

<?php
error_reporting(0);
$a=$_POST['search'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$servername="localhost";
$username="root";
$password="";
$dbname = "getform";

$con=mysqli_connect($servername,$username,$password,$dbname);

if(!$con)
{
die("connection failed".mysqli_connect_error());
}
if($a=="")
{
$sql="SELECT *from school";
$result = $con->query($sql);
// echo "<input type='text'><input type='submit' value='search' class='btn btn-primary'>";
echo "<table class='table table-striped'>";
echo "<tr>
<th>Parent_Name</th>
<th>Email</th>
<th>Student_Name</th>
<th>Gender</th><th>DOB</th>
<th>Contact_Number</th><th>Message</th>
<th>Address</th>
<th>City</th>
<th>Zip_Code</th>
<th colspan='2'>Operations</th>
</tr>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr> <td>".$row['P_Name']."</td>";
    echo "<td>".$row['Email']."</td>";
    echo "<td>".$row['S_Name']."</td>";
    echo "<td>".$row['Gender']."</td>";
    echo "<td>".$row['DOB']."</td>";
    echo "<td>".$row['C_Number']."</td>";
    echo "<td>".$row['Message']."</td>";
    echo "<td>".$row['Address']."</td>";
    echo "<td>".$row['City']."</td>";
    echo "<td>".$row['Zip_Code']."</td>";
    echo "<td><a href='update.php?sno=$row[Email]&P_Name=$row[P_Name]
    &email=$row[Email]
    &sname=$row[S_Name]&gender=$row[Gender]&dob=$row[DOB]&cnumber=$row[C_Number]
    &msg=$row[Message]&address=$row[Address]&city=$row[City]&zip=$row[Zip_Code]' class='btn btn-primary'>Update</a></td><td> <a href='delete.php?sno=$row[Email]' class='btn btn-danger'> Delete</a></td></tr>";
  }
} else {
  echo "0 results";
}
echo "<table>";

$con->close();
}
else
{
    $sql="SELECT *from school where P_Name like '$a%' or Email='$a'";
    $result = $con->query($sql);
    // echo "<input type='text'><input type='submit' value='search' class='btn btn-primary'>";
    echo "<table class='table table-striped'>";
    echo "<tr>
    <th>Parent_Name</th>
    <th>Email</th>
    <th>Student_Name</th>
    <th>Gender</th><th>DOB</th>
    <th>Contact_Number</th><th>Message</th>
    <th>Address</th>
    <th>City</th>
    <th>Zip_Code</th>
    <th colspan='2'>Operations</th>
    </tr>";
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr> <td>".$row['P_Name']."</td>";
        echo "<td>".$row['Email']."</td>";
        echo "<td>".$row['S_Name']."</td>";
        echo "<td>".$row['Gender']."</td>";
        echo "<td>".$row['DOB']."</td>";
        echo "<td>".$row['C_Number']."</td>";
        echo "<td>".$row['Message']."</td>";
        echo "<td>".$row['Address']."</td>";
        echo "<td>".$row['City']."</td>";
        echo "<td>".$row['Zip_Code']."</td>";
        echo "<td><a href='update.php?sno=$row[id]&P_Name=$row[P_Name]
        &email=$row[Email]
        &sname=$row[S_Name]&gender=$row[Gender]&dob=$row[DOB]&cnumber=$row[C_Number]
        &msg=$row[Message]&address=$row[Address]&city=$row[City]&zip=$row[Zip_Code]' class='btn btn-primary'>Update</a></td><td> <a href='delete.php?sno=$row[id]' class='btn btn-danger'> Delete</a></td></tr>";
      }
    } else {
      echo "No record found!";
    }
    echo "<table>";
    
    $con->close();
        
}

?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

<script>
     $(document).ready(function () {


$('#login').submit(function (e) {
    e.preventDefault();
   var a= $('#sno').val();
   console.log(a);
 $.ajax({

          type: "POST",
          url: "show.php",
          data: $(this).serialize(),
          success: function (data) {
            console.log(this.data);
            // document.getElementById("show-data").innerHTML = "Data successfuly submit";

          }
        });
    });
});
    </script>