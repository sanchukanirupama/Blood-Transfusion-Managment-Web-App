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
<script src=js.js"></script>
</head>

<body>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="im2.png" width="30" height="30" class="d-inline-block align-top" alt="">
    National Blood Bank
  </a>
</nav>

<div class="container">
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Logged Successfully!</h4>
  <p>You successfully logged in to the national blood bank system. thank you for beeing donator</p>
  <hr>
  <p class="mb-0">Donate blood and Save lives.</p>
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
 <th colspan = "2">Action</th>
 </tr>
 </thead>

 <?php
      while($row = $result->fetch_assoc()): ?>
      <tr>
      <td><?php echo $row['hospital_name']; ?></td>
      <td><?php echo $row['district']; ?></td>
      <td><?php echo $row['bloodgroup']; ?></td>
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
<footer class="page-footer font-small indigo">

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

