<?php
include('database.php');
?>

<?php
if(isset($_GET['id'])){

    $main_id = $_GET['id'];
    $update = $mysqli ->query("UPDATE acceptreq SET status = 1 WHERE id = '$main_id'") or die($mysqli->error);
}
?>
<html>

<head>
            <title>Notification</title> 
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
          <a class="nav-link" href="home.php">Profile</a>
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
  <?php
session_start();
$mail = $_SESSION['user_email'];
$accept_result = $mysqli ->query("SELECT*FROM acceptreq WHERE hospital_email = '$mail'") or die($mysqli->error);
?>
  <div class="view intro-2" style="">
    <div class="full-bg-img">
      <div class="mask rgba-purple flex-center">
        <div class="container text-center white-text wow fadeInUp">
          
<div class="container">
<div class="row justify-content-center">
<table class="table table-light">
 <thead class="thead-dark">
 <tr>
 <th>Donor Name</th>
 <th>Gender</th>
 <th>Weight (Kg)</th>
 <th>Requested Blood Group</th>
 <th>Accepted Date</th>
 <th>Telephone Number</th>
 <th>Medical Condition</th>
 <th colspan = "2">Action</th>
 </tr>
 </thead>

 <?php
      while($row = $accept_result->fetch_assoc()): ?>
      <tr>
      <td><?php echo $row['donorName']; ?></td>
      <td><?php echo $row['gender']; ?></td>
      <td><?php echo $row['weight']; ?></td>
      <td><?php echo $row['bloodGroup']; ?></td>
      <td><?php echo $row['cr_date']; ?></td>
      <td><?php echo $row['telephone']; ?></td>
      <td><?php echo $row['Medic_con']; ?></td>
      <td>
      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#message<?php echo $row['id'];?>">Accept</button>
      <div id="message<?php echo $row['id'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">CONTACT DONOR</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="notiaccept.php" method="post">
      <div class="modal-body">
        <div class="form-group">
             <label>Donor</label>
             <input type="text" readonly class="form-control-plaintext" name="staticemail" id="staticEmail" value="<?php echo $row['donoremail']; ?>">
            </div>
            <div class="form-group">
             <label>Hospital Name</label>
             <input type="text" readonly class="form-control-plaintext" name="staticname" id="staticname" value="<?php echo $row['hospitalname']; ?>">
            </div>
        <div class="form-group">
             <label>Hospital Email</label>
             <input type="text" readonly class="form-control-plaintext" name="token" id="token" value="<?php echo $row['hospital_email'];?>">
              </div>
        <div class="form-group">
            <label>Message</label>
            <textarea type="varchar" name="message" rows="3" class="form-control"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-success btn-sm">Send</button>
      </div>
     </form>
    </div>
  </div>
</div>

      </td>
      <td>
      <a href="notiaccept.php?delete=<?php echo $row['id']; ?>"
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
  </div>

</header>

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
