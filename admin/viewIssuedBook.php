<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header("location: adminLogin.php");
    exit;
}
?>
<?php
require "../connect.php";
$sql="delete from issued_books where book_no=$_GET[bn]"; 
$result= mysqli_query($connect,$sql);
if($result ){
  echo '<script>
alert("Book Deleted Successfully"); 
 </script>';
}
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
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
<!-- Admin Dashboard -->
<nav class="navbar navbar-expand-lg bg-light navbar-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="../adminDashboard.php">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navbar-right" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Books
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="add_book.php">Add New books</a></li>
            <li><a class="dropdown-item" href="delete_book.php">Delete Book</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="add_category.php">Add new Category</a></li>
            <li><a class="dropdown-item" href="delete_category.php">Delete Category</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Author
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="add_author.php">Add new Author</a></li>
            <li><a class="dropdown-item" href="delete_author.php">Delete Author</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="issue_book.php">Issue Book</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>

    <!-- Section: Design Block -->
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

      <!-- <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div> -->

        <div class="card ">
          <div class="card-body ">
          <div class="row container d-flex justify-content-center">

          <div class=" grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Books</h4>
                  <p class="card-description">
                    Books in the Library
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Book no.</th>
                          <th>Book Name</th>
                          <th>Author</th>
                          <th>Student</th>
                          <th>Date of Issue</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <?php
                      require "../connect.php";
                      $sql= "select  issued_books.book_name,issued_books.book_author,issued_books.book_no,issued_books.issued_date,users.username from issued_books left join users on issued_books.student_id=users.sno";
                      $result=mysqli_query($connect,$sql);
                      while($row=mysqli_fetch_assoc($result)){
                          $book_no=$row['book_no'];
                          $book_name=$row['book_name'];
                          $author=$row["book_author"];
                          $datetime=$row["issued_date"];
                          $student_name=$row["username"];
                          ?>
                          <tbody>
                        <tr>
                          <td><?php echo $book_no;?></td>
                          <td><?php echo $book_name;?></td>
                          <td><?php echo $author;?></td>
                          <td><?php echo $student_name;?></td>
                          <td><?php echo $datetime;?></td>
                          <td>
                            <button class="btn"><a href="viewIssuedBook.php?bn=<?php echo $row['book_no'];?>">Return</a></button>
                        </td>
                          <td><label class="badge badge-danger">Pending</label></td>
                        </tr>
                      </tbody>
                      <?php
                    }
                      ?>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            </div>
              </div>
            </div>



          <!-- </div>
        </div>
      </div> -->
    </div>
  </div>
</section>



       
</section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
