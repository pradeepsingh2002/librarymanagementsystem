<?php

$exist=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
require "connect.php";
$username=$_POST["username"];
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
$phone=$_POST["mobile"];
$email=$_POST["email"];
$address=$_POST["address"];

$existsql="SELECT * FROM `users` WHERE username='$username' or email='$email'"; 
$result= mysqli_query($connect,$existsql);
$num = mysqli_num_rows($result);
if($num>0){
  echo '<script>
  alert("User Already Exist"); 

   </script>';
}
else{
  if($password == $cpassword){
    $hash= password_hash($password,PASSWORD_DEFAULT);
    $sql="INSERT INTO `users` (`username`, `email`, `password`, `mobile`, `address`, `datetime`) VALUES ( '$username', '$email', '$hash', '$phone', '$address', current_timestamp())";
     $result=mysqli_query($connect,$sql);
  
     if($result){
      echo '<script>
      alert("Your Account is Create successfully You May Now Login"); 
    
       </script>';
      }
      else{
        
        echo '<script>
    alert("Error!! Try After Some Time"); 
  
     </script>';
      }

  }
  else{  
    echo '<script>
    alert("Password do Not Match"); 
  
     </script>';
  }
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <?php
    require "navbar.php";
    ?>
    

    <!-- Section: Design Block -->
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
         
    <center><h3>User registration Form</h3></center>
    <form action="registration.php" Method="post">
  <div class="mb-3">
    <label for="name" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="name"  required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password" required>
  </div>
  <div class="mb-3">
    <label for="check password" class="form-label">Confirm Password</label>
    <input type="Password" name="cpassword" class="form-control" id="check password" >
    <div id="emailHelp" class="form-text">Password and Check Password must be same</div required>
  </div>
  <div class="mb-3">
    <label for="Phone" class="form-label">Phone</label>
    <input type="number" name="mobile" class="form-control" id="phone" maxlength="10" length="10" required>
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="address" required>
  </div>
  <div class="mb-3 form-check">
    <input type="Checkbox" class="form-check-input" id="checkbox" required>
    <label class="form-check-label" name="checkbox" for="checkbox">make sure you fill correct detail</label>
  </div>
  
  <button type="submit" class="btn btn-primary container my-3">Submit</button>
</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>