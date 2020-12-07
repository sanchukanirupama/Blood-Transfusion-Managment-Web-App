<?php 
session_start();
if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: login.php');
  exit();
}
?>
<html>
<head>
            <title>Home Page</title> 
            <link rel="stylesheet" type="text/css"
            href="style home.css">
            <link rel="stylesheet" type="text/css"
            href="bootstrap.min.css">
            <link rel="stylesheet" type="text/css"
            href="nav.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
            <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<script>
function sweetclick(){
  swal("Successfully Logged!", " Thank You For Beeing Valubal Donor ", "success");
}

</script>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
<img src="im3.png" width="30" height="30" class="d-inline-block align-top" alt=" ">
    <a class="navbar-brand" href="#"><strong>&nbsp National Blood Bank</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="view intro-2" style="">
    <div class="full-bg-img">
      <div class="mask rgba-purple-light flex-center">
        <div class="container text-center white-text wow fadeInUp">
          <h1>DONATE BLOOD AND SAVE LIVES </h1>
          <br>
          <h2>" A single pint can save three lives, a single gesture can create a million smiles "</h2>
          
        </div>
      </div>
    </div>
  </div>
  <?php 
if(isset($_SESSION['message'])): ?>
<div class="container">
<div class="alert alert-<?=$_SESSION['msg_type']?>">
      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>

</div>
</div>
<?php endif ?>

<div class="container">
<form action="crud.php" method="post">

  <div class="form-row login-left">
    <div class="form-group col-md-6">
      <label for="inputCity">Hospital Name</label>
      <input type="text" name='hname' class="form-control" id="inputCity" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">District</label>
      <select id="inputState" class="form-control" name='district' required>
        <option selected>Choose...</option>
            <option>Gampaha</option>
            <option>Colombo</option>
            <option>Kaluthara</option>
            <option>Nuwaraeliya</option>
      </select>
    </div>
    <div class="form-group col-md-2">
    <label for="inputState">Requierd Blood Group</label>
      <select id="inputState" class="form-control" name='bgroup' required>
        <option selected>Choose...</option>
            <option>A+</option>
            <option>A-</option>
            <option>B+</option>
            <option>B-</option>
            <option>O+</option>
            <option>O-</option>
            <option>AB+</option>
            <option>AB-</option>
            </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Discription</label>
      <input type="text" name='discription' class="form-control" id="Discrip">
    </div>
  </div>
  <button type="submit" name='save' class="btn btn-light btn-sm">Published Request</button>
</form>
<?php require_once 'crud.php'; ?>


<?php
$mysqli = new mysqli ('localhost', 'root' , '1234' , 'bloodbank') or die (mysqli_error($mysqli));
$result = $mysqli ->query("SELECT*FROM crud") or die($mysqli->error);
?>

<div class="container">
<div class="row justify-content-center">
<table class="table login-left">
 <thead class="thead-light">
 <tr>
 <th>Hospital Name</th>
 <th>District</th>
 <th>Requested Blood Type</th>
 <th>Date</th>
 <th colspan = "2">Action</th>
 </tr>
 </thead>

 <?php
      while($row = $result->fetch_assoc()): ?>
      <tr>
      <td><?php echo $row['hospital_name']; ?></td>
      <td><?php echo $row['district']; ?></td>
      <td><?php echo $row['bloodgroup']; ?></td>
      <td><?php echo $row['req_time']; ?></td>
      <td>
      <a href="crud.php?delete=<?php echo $row['id']; ?>"
      class="btn btn-danger btn-sm ">Delete</a>

      
      </td>
    </tr>
    <?php endwhile; ?>

</table>
</div>
</div> 


<?php
function pre_r($array){

  echo '<pre>';
  print_r($array);
  echo '</pre>';
} 

?>

</div>
</body>
<footer class="page-footer font-small unique-color-dark pt-4">

  <!-- Footer Elements -->
  <div class="container">

    <!-- Grid row-->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-12 py-5">
        <div class="mb-5 flex-center">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Pinterest-->
          <a class="pin-ic">
            <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
          </a>
        </div>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#">Team Goodfellas</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</html>

