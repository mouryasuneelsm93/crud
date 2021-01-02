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
$Pname=$_GET['P_Name'];
$email=$_GET['email'];
$sname=$_GET['sname'];
$gender=$_GET['gender'];
$dob=$_GET['dob'];
$cnumber=$_GET['cnumber'];
$address=$_GET['address'];
$msg=$_GET['msg'];
$city=$_GET['city'];
$zip=$_GET['zip'];

// echo $sno."<br>".$Pname."<br>".$email."<br>".$sname."<br>".$gender."<br>".$dob."<br>".$cnumber."<br>".$address."<br>".$msg."<br>".$city."<br>".$zip."<br>";


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Document</title>
  <style>
    body {
      background-color: #FFF9C0;
    }

    a {
      text-decoration: none;
      padding: 10px 10px;
    }

    .table1 {
      width: 40%;
      border: 0px;
      margin: auto;


    }

    .table1 tr {
      border: 0px;
    }

    .astric {
      color: red;
      font-size: 20px;
    }

    h1 {
      padding-top: 2%;
      padding-bottom: 1%;
      font-weight: bold;
      color: #0089D3;
    }
    h5{
      text-align:right;
      width:80%;
      color:#0089D3;
      font-weight: bold;
    }
  </style>

</head>

<body>

  <h1>
    <center>Update Data</center>
  </h1>
    <form method="POST">
    <table class="table1">
      <tr>
        <th>Parent(s)Name(s) <span class="astric"> * </span></th>
        <td><input type="text" class="form-control" name="pname" id="pname" value="<?php echo $Pname; ?>"></td>
      <tr>
        <th>Email <span class="astric"> * </span></th>
        <td><input type="text" name="gmail" id="mail" class="form-control" value="<?php  echo $email;  ?>"></td>
      </tr>
      <tr>
        <th>Student Name <span class="astric"> * </span></th>
        <td><input type="text" name="sname" id="sname" class="form-control" value="<?php echo $sname;   ?>"></td>
      </tr>
      <tr>
        <th>Student Gender <span class="astric"> * </span></th>
        <td>Male <input type="radio" name="gen" value="Male"> Female <input type="radio" value="Female" name="gen"></td>
      </tr>
      <tr>
        <th>DOB <span class="astric"> * </span></th>
        <td><input type="date" name="date" ></td>
      </tr>
      <tr>
        <th>Contact No. <span class="astric"> * </span></th>
        <td><input type="text" name="no" id="n1" class="form-control" value="<?php  echo $cnumber; ?>"> </td>
      </tr>
      <tr>
        <th>Do you receive text at this no <span class="astric"> * </span></th>
        <td>Yes <input type="radio" name="yes" value="Yes"> No <input type="radio" name="yes" value="No"></td>
      </tr>
      <tr>
        <th>Address <span class="astric"> * </span></th>
        <td>
          <textarea id="my-textarea" class="form-control" rows="3" name="add"> <?php  echo $address;  ?></textarea>
        </td>
      </tr>
      <tr>
        <th>City <span class="astric"> * </span></th>
        <td><select name="state" class="form-control" id="state" value="<?php echo $city;?>">
            <option>Select City</option>
            <option>Lucknow</option>
            <option>Kanpur</option>
            <option>Sitapur</option>
            <option>Sultanpur</option>
          </select>
        </td>
      </tr>

      <tr>
        <th>Zip Code <span class="astric"> * </span></th>
        <td><input type="text" id="zip" class="form-control" name="zip" value="<?php echo $zip;   ?>"></td>
      </tr>
      <tr>
        <td><input type="submit" value="submit" class="btn btn-danger" name="submit" ></td>
      </tr>
    </table>
  </form>
</body>

</html>

<?php

if(isset($_POST['submit']))
{


$pnames=$_POST["pname"];
$gmails=$_POST['gmail'];
$snames=$_POST["sname"];
$gen=$_POST["gen"];
$date=$_POST['date'];
$n1=$_POST["no"];
$yes=$_POST['yes'];
$add=$_POST["add"];
$state=$_POST['state'];
$zips=$_POST['zip'];
echo $pnames."<br>".$gmails."<br>".$snames."<br>".$gen."<br>".$date."<br>".$n1."<br>".$yes."<br>".$add."<br>".$state."<br>".$zip."<br>";

$sql="UPDATE school
SET P_Name='$pnames',Email='$gmails',S_Name='$snames',Gender='$gen',DOB='$date',C_Number='$n1',Message='$yes',Address='$add',City='$state',Zip_Code='$zips'
WHERE Email='$sno'";

if($con->query($sql)==true)
{
    header("location:show.php");
}
else 
{
    echo "query error";
}

}



?>