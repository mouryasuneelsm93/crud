<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  <style>
    .table-borderless{
        width:25%;
        margin:auto;
        margin-top:2%;
        
        border:2px solid grey;
        box-shadow:0px 0px 10px 10px blue;
    }
    h1{
        color:white;
        margin-top:18%;
        font-weight:bold;
        
    }
    body{
        background-color:rgba(0,0,255,.6);
    }
    </style>
    <title>Admin</title>
</head>
<body>

<div class="text-center">
<h1>Admin Panel</h1></div>
<form method="post" id="form">
   <table class="table table-borderless">
    <tr><td><input type="text" class="form-control" value="admin123" placeholder="username" name="username" required></td></tr>
    <tr><td><input type="password" class="form-control" value="admin123@" placeholder="password" name="pass" required></td></tr>
    <tr><td><button type="submit" name="submit"  class="form-control btn btn-danger" onclick="click()1">Login</td></tr>
   </table> 
   </form>
   
</body>
</html>

<?php
if(isset($_POST["submit"]))
{
    $server="localhost";
    $username="root";
    $password="";
    $dbname="getform";
    $con=mysqli_connect($server,$username,$password,$dbname);
    if(!$con)
    {
        die("connection failed!".mysqli_connect_error);
    }
    $user=$_POST["username"];
    $pass=$_POST["pass"];
  
    $sql="SELECT *from admin where username='$user' and password='$pass'";
    $result=$con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name=$row["username"];
        $passw=$row["password"];
       if($user==$name&&$pass==$passw)
       {
       
        header("location:show.php");
       }

    }
  } else {
    echo "0 results";
  }
  $con->close();
}


?>
