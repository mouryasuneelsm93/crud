<?php
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

$sno=$_GET['sno'];

$sql="DELETE From school where Email='$sno'";

if($con->query($sql)==true)
{
    header("location:show.php");
}
else 
{
    echo "query error";
}

?>