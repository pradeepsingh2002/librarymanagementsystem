<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header("location: ../login.php");
    exit;
}
If($_SERVER["REQUEST_METHOD"]=="POST"){
    require "../connect.php";
    $password=$_POST["password"];
$newpassword=$_POST["newpassword"];
$newcpassword=$_POST["newcpassword"];

if($newpassword==$newcpassword){
    $email=$_SESSION['email'];
    $sql= "SELECT * FROM `admin` WHERE `email` LIKE '$email'"; 
$result=mysqli_query($connect,$sql);


while($row = mysqli_fetch_assoc($result)){
    if($password==$row['password']){
        $hash=$newpassword;
          $sql="UPDATE `admin` SET `password`='$hash' where `users`.`email`='$email'";
          $result=mysqli_query($connect,$sql);
          if($result){
            echo '<script>
            alert("Password is Update Successfully"); 
            window.location.href="../adminDashboard.php";
             </script>';
           
          }
    }
    else{
        echo '<script>
        alert("Fail!!! Old Password Does Not Match");
        </script>';
    }
}

}
else{
        echo '<script>
        alert("Fail!!! New Password and Confirm Password Does Not Match");
        </script>';
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">RTU</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navbar-right" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Profile
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="viewProfile.php">View Profile</a></li>
            <li><a class="dropdown-item" href="editProfile.php">Edit Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="changePassword.php">Change password</a></li>
          </ul>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="../adminlogout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }
    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }
    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }
    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          University Department, <br />
          <span style="color: hsl(218, 81%, 75%)">Rajasthan Technical University, Kota</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
         
    <center><h3>Edit Profile</h3></center>
    <form action="changePassword.php" Method="post">
  
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" value="<?php echo "$_SESSION[email]";?>" name="email" class="form-control" id="email" aria-describedby="emailHelp" disabled>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
 
  <div class="mb-3">
    <label for="password" class="form-label">Old Password</label>
    <input type="password" name="password" class="form-control" id="password" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">New Password</label>
    <input type="password" name="newpassword" class="form-control" id="password" required>
  </div>
 
  <div class="mb-3">
    <label for="check password" class="form-label">New Confirm Password</label>
    <input type="Password" name="newcpassword" class="form-control" id="check password" required>
    <div id="emailHelp" class="form-text">Password and Check Password must be same</div >
  </div>

  <div class="mb-3 form-check">
    <input type="Checkbox" class="form-check-input" id="checkbox" required>
    <label class="form-check-label" name="checkbox" for="checkbox">Make Sure you want to Update</label>
  </div>
  
  <button type="submit" class="btn btn-primary container my-3">Update</button>
</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>