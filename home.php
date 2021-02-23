<?php 
include('database.php');
if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: login.php');
  exit();
}
$mysqli->query("DELETE from crud where datediff(now(), crud.req_time) > 1");

?>
<html>
<head>
            <title>Hospital Profile</title> 
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

<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
<img src="im3.png" width="30" height="30" class="d-inline-block align-top" alt=" ">
    <a class="navbar-brand" href="#"><strong>&nbsp National Blood Bank</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php
session_start();
$mail = $_SESSION['user_email'];
$result = $mysqli ->query("SELECT*FROM crud WHERE hemail = '$mail'");
?>
    <?php
    $check = $mysqli ->query("SELECT*FROM acceptreq WHERE status=0 && hospital_email='$mail'") or die($mysqli->error);
    $count = mysqli_num_rows($check);
    ?>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown ml-auto">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Notification <i class="far fa-bell"></i> <span class="badge badge-danger" id="count"><?php echo $count ?></span>
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <?php
         $check1 = $mysqli ->query("SELECT*FROM acceptreq WHERE status=0 && hospital_email='$mail'") or die($mysqli->error);

         if(mysqli_num_rows($check1)>0){
         while($get_result=mysqli_fetch_assoc($check)){
         
          echo '<a class="dropdown-item  font-weight-bold" href="notification.php?id='.$get_result['id'].'"> <i class="fas fa-check-circle"></i> Your Request Accepted By '.$get_result['donorName'].'</a>';
          echo '<div class="dropdown-divider"></div>';
         }
         }
         else{
          echo '<a class="dropdown-item text-danger font-weight-bold" href="notification.php">Sorryy!! Havent Found Any Donor</a>';
         }
         ?>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="login.php">Logout <i class="fas fa-sign-out-alt"></i></a>
        </li>
        </ul>
      
    </div>
  </nav>

  <div class="view intro-2" style="">
    <div class="full-bg-img">
      <div class="mask rgba-purple flex-center">
        
<div class="container">
<form action="crud.php" method="post">

  <div class="form-row login-right">
    <div class="form-group col-md-6">
      <label for="inputCity">Hospital Name</label>
      <input type="text" name='hname' class="form-control" id="inputCity">
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
  <button type="submit" name='save' class="btn btn-primary btn-sm">Published Request</button>
</form>
<?php require_once 'crud.php'; ?>


<div class="container">
<div class="row justify-content-center">
<table class="table table-dark">
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
      <td ><?php echo $row['hospital_name']; ?></td>
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




</div>
      </div>
    </div>
  </div>
  
<?php 
if(isset($_SESSION['message0'])): ?>

      <?php
      echo '<script> swal("Deleted Successesfully!", "You Can Publish Requests If You have", "error")</script>';
      unset($_SESSION['message0']);
      ?>

<?php 
elseif(isset($_SESSION['message'])): ?>

      <?php
      echo '<script> swal("Request Published Successfully!", "Wait For A Donor To Accepet The Request", "success")</script>';
      unset($_SESSION['message']);
      ?>

<?php endif ?>

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

