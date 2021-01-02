
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
// echo "successful";
$pname=$_POST["pname"];
$gmail=$_POST['gmail'];
$sname=$_POST["sname"];
$gen=$_POST["gen"];
$date=$_POST['date'];
$n1=$_POST["no"];
$yes=$_POST['yes'];
$add=$_POST["add"];
$state=$_POST['state'];
$zip=$_POST['zip'];
echo $pname;
echo $gmail;
echo $sname;
echo $gen;
echo $date;
echo $n1;
echo $yes;
echo $add;
echo $state;
echo $zip;
 $sql="INSERT INTO school(P_Name,Email,S_Name,Gender,DOB,C_Number,Message,Address,City,Zip_Code)VALUES('$pname','$gmail','$sname','$gen','$date','$n1',' $yes','$add','$state','$zip')";
if($con->query($sql)==true)
{
echo "inserted";
}
else
{
echo "error";
}

?>