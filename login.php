<html>
<head>
            <title>User Login and Registration</title> 
            <link rel="stylesheet" type="text/css"
            href="style.css">
            <link rel="stylesheet" type="text/css"
            href="bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
            
</head>

<body>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="im2.png" width="30" height="30" class="d-inline-block align-top" alt="">
    National Blood Bank
  </a>
</nav>
<div class="container">
    <div class="login-box">
    <div class="row">
    <div class="col-md-6 login-left">
        <h2> Login Here </h2>
        <form action="validation.php" method="post">
            <div class="form-group">
             <label>E-mail Address</label>
            <input type="email" name="email" class="form-control" required>
            </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
            <label>Login as a </label>
                <select class="form-control" name="select" required>
                  <option value="">Choose...</option>
                  <option value="1">Donor</option>
                  <option value="2">Hospital</option>
             </select>
    <div class="invalid-feedback">Example invalid custom select feedback</div>
  </div>
            <button type="submit" class="btn blue-gradient btn-sm">Login</button> 
        </form>
    </div>
    <div class="col-md-6 login-right">
        <h2> Register As a Donor </h2>
        <form action="registation.php" method="post">
        <div class="form-group">
             <label>Full Name</label>
            <input type="text" name="user" class="form-control" required>
            </div>
        <div class="form-group">
             <label>E-mail address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
              </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
            <label>Gender </label>
                  <br>
                <select class="form-control" name="gender" required>
                  <option>Choose...</option>
                  <option>Male</option>
                  <option>Female</option>
             </select>
             <br>
    
    <div class="form-group">
            <label>Select your District </label>
            <br>
                <select class="form-control" name="district" required>
                  <option>Choose...</option>
                  <option>Gampaha</option>
                  <option>Colombo</option>
                  <option>Galle</option>
                  <option>Kaluthara</option>
                  <option>Nuwaraeliya</option>
                  <option>Jaffana</option>
             </select>
             <br>
        <div class="form-group">
        <label for="FormControlSelect">Select Your Blood Group</label>
        <select class="form-control" name="bloodgroup" id="bloodgrooup" required>
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
         <button type="submit" id='reg' class="btn aqua-gradient btn-sm">Register</button> 
        </form>
    </div>
        </div>
    </div>
  
</div>

</body>


</html>
