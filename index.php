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
    .logo
    {
      font-size: 50px;
      font-weight:bold;
      text-shadow: 2px 2px red;
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand logo" href="#" >CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link text-muted" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link btn btn-primary text-warning" href="admin.php" >Admin</a>
        </li>
      </ul>
    </div>
  </nav>
  <h1>
    <center>Preschool Package Registration Form</center>
  </h1>
  

  <form method="POST" id="loginform">
    <table class="table1">
      <tr>
        <th>Parent(s)Name(s) <span class="astric"> * </span></th>
        <td><input type="text" class="form-control" name="pname" id="pname"></td>
      <tr>
        <th>Email <span class="astric"> * </span></th>
        <td><input type="text" name="gmail" id="mail" class="form-control"></td>
      </tr>
      <tr>
        <th>Student Name <span class="astric"> * </span></th>
        <td><input type="text" name="sname" id="sname" class="form-control"></td>
      </tr>
      <tr>
        <th>Student Gender <span class="astric"> * </span></th>
        <td>Male <input type="radio" name="gen" value="Male"> Female <input type="radio" value="Female" name="gen"></td>
      </tr>
      <tr>
        <th>DOB <span class="astric"> * </span></th>
        <td><input type="date" name="date"></td>
      </tr>
      <tr>
        <th>Contact No. <span class="astric"> * </span></th>
        <td><input type="number" name="no" id="n1" class="form-control"> </td>
      </tr>
      <tr>
        <th>Do you receive text at this no <span class="astric"> * </span></th>
        <td>Yes <input type="radio" name="yes" value="Yes"> No <input type="radio" name="yes" value="No"></td>
      </tr>
      <tr>
        <th>Address <span class="astric"> * </span></th>
        <td>
          <textarea id="my-textarea" class="form-control" rows="3" name="add"></textarea>
        </td>
      </tr>
      <tr>
        <th>City <span class="astric"> * </span></th>
        <td><select name="state" class="form-control" id="state">
            <option value="select City" selected>Select City</option>
            <option>Lucknow</option>
            <option>Kanpur</option>
            <option>Sitapur</option>
            <option>Sultanpur</option>
          </select>
        </td>
      </tr>

      <tr>
        <th>Zip Code <span class="astric"> * </span></th>
        <td><input type="text" id="zip" class="form-control" name="zip"></td>
      </tr>
      <tr>
        <td><input type="submit" value="submit" class="btn btn-danger" name="submit" data-toggle="modal"
            data-target="#myModal"></td>
      </tr>
    </table>
  </form>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div id="show-data">
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  
</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

<script>
  $(document).ready(function () {


    $('#loginform').submit(function (e) {
      e.preventDefault();
      var pname = $('#pname').val();
      var sname = $('#sname').val();
      var n1 = $('#n1').val();
      var mail = $('#mail').val();
      var state = $('#state').val();
      var add = $('#my-textarea').val();
      var zip = $('#zip').val();
      var validmail = mail.includes("@");

      if (pname == "") {
        document.getElementById("show-data").innerHTML = "please enter Parent name";
      }
      else if (mail == "") {
        document.getElementById("show-data").innerHTML = "please enter email address";
      }
      else if (validmail != true) {
        document.getElementById("show-data").innerHTML = "please enter valid mail address";
      }
      else if (sname == "") {
        document.getElementById("show-data").innerHTML = "please enter Student Name";
      }
      else if (n1 == "") {
        document.getElementById("show-data").innerHTML = "please enter Contact No";
      }
      else if (n1.length < 10) {
        document.getElementById("show-data").innerHTML = "please must be 10 digit";
      }
      else if (n1.length > 10) {
        document.getElementById("show-data").innerHTML = "please must be 10 digit";
      }
      else if (add == "") {
        document.getElementById("show-data").innerHTML = "please enter address";
      }
      else if (state == "select City") {
        document.getElementById("show-data").innerHTML = "please select city";
      }
      else if (zip == "") {
        document.getElementById("show-data").innerHTML = "please select zip code";
      }
      else {

        $.ajax({
          type: "POST",
          url: "insert.php",
          data: $(this).serialize(),
          success: function (data) {
            console.log(data);
            document.getElementById("show-data").innerHTML = "Data successfuly submit";

          }
        });
      }
    })
  });
</script>