<?php
if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: login.php');
  exit();
}

?>

<html>

<head>
            <title>Donor Profile</title> 
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
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<!--Main Navigation-->
<header>
<html lang="en" class="full-height">

<!--Main Navigation-->
<header>

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
          <a class="nav-link" href="index.php">Home <i class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="login.php?<?php  unset($_SESSION['user_email']); ?>">Logout  <i class="fas fa-sign-out-alt"></i></a>
        </li>
        </ul>
      <span class="navbar-text white-text">
    </span>
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

</header>
<?php
session_start();
include('database.php');
include('delete.php');
$mail = $_SESSION['user_email'];
$result = $mysqli ->query("SELECT*FROM crud WHERE district = (SELECT district FROM donators WHERE email = '$mail') && bloodgroup = (SELECT bloodgroup FROM donators WHERE email = '$mail')");
?>

<?php 
if(isset($_SESSION['message01'])): ?>

      <?php
      echo '<script> swal("Already Accepted!", "You Already Accepted This Request !", "warning")</script>';
      unset($_SESSION['message01']);
      ?>

<?php
elseif(isset($_SESSION['message02'])): ?>
      <?php
      $token = $_SESSION['message02'];
      $to = $mysqli ->query("SELECT hemail from crud WHERE id ='$token'");
      $subject = "You Got A Match";
      $mess = "You got a match from donor for your request";
      mail($to,$subject,$mess);
      echo '<script> swal("Request Accepted Successfully!", "Your Donation Will Bright Someones Future!", "success")</script>';
      unset($_SESSION['message02']);
      ?>
<?php endif ?>

<div class="container">
<div class="row justify-content-center">
<table class="table table-hover table-light">
 <thead class="thead-dark">
 <tr>
 <th>Hospital Name</th>
 <th>District</th>
 <th>Requested Blood Type</th>
 <th>Date</th>
 <th>Discription</th>
 <th colspan = "1">Action</th>
 </tr>
 </thead>

 <?php
      while($row = $result->fetch_assoc()): ?>
      <tr>
      <td><?php echo $row['hospital_name']; ?></td>
      <td><?php echo $row['district']; ?></td>
      <td><?php echo $row['bloodgroup']; ?></td>
      <td><?php echo $row['req_time']; ?></td>
      <td><?php echo $row['Discription']; ?></td>
      <td>
      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#message<?php echo $row['id'];?>">Accept</button>
      <div id="message<?php echo $row['id'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
   
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ADD YOUR DETAILS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="accept.php" method="post">
      <div class="modal-body">
        <div class="form-group">
             <label>Donor</label>
             <input type="text" readonly class="form-control-plaintext" name="staticemail" id="staticEmail" value="<?php echo $mail; ?>">
            </div>
        <div class="form-group">
             <label>Token Number</label>
             <input type="text" readonly class="form-control-plaintext" name="token" id="token" value="<?php echo $row['id'];?>">
              </div>
        <div class="form-group">
            <label>Telephone Number</label>
            <input type="text" name="teleno" class="form-control" required>
            </div>
        <div class="form-group">
            <label>Weight In Kilograms</label>
            <input type="text" name="weight" class="form-control" required>
            </div>
        <div class="form-group">
            <label>Mention The Names Of Medicines (if you takeing any at the moment)</label>
            <input type="text" name="medic" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-success btn-sm">Accept Request</button>
      </div>
     </form>
    </div>
  </div>
</div>

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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.1.min.js" integrity="sha256-SDf34fFWX/ZnUozXXEH0AeB+Ip3hvRsjLwp6QNTEb3k=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
