
<?php

function get_user_count(){
    require "connect.php";
   
    
    $sql= "SELECT count(*) as user_count FROM users";
    $result=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_assoc($result)){
       $user_count=$row['user_count'];
  }
  return ($user_count);
}

function get_category_count(){
    require "connect.php";
    $sql= "SELECT count(*) as cat_count FROM category";
    $result=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_assoc($result)){
       $cat_count=$row['cat_count'];
  }
  return ($cat_count);
}
function get_book_count(){
    require "connect.php";
    $sql= "SELECT count(*) as book_count FROM book";
    $result=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_assoc($result)){
       $book_count=$row['book_count'];
  }
  return ($book_count);
}

function get_issued_book_count(){
    require "connect.php";
    $sql= "SELECT count(*) as issued_book_count FROM issued_books";
    $result=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_assoc($result)){
       $issued_book_count=$row['issued_book_count'];
  }
  return ($issued_book_count);
}

function get_author_count(){
    require "connect.php";
    $sql= "SELECT count(*) as author_count FROM authors";
    $result=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_assoc($result)){
       $author_count=$row['author_count'];
  }
  return ($author_count);
}


?>