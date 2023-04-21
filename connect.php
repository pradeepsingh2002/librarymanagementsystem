<?php
$servername="localhost";
$username="root";
$password="";
$database="library";
$connect= mysqli_connect($servername,$username,$password,$database);
if(!$connect){
    //    echo "connected";
    // }
    // else{
        
        die("Sorry!, we fail to connect to data".mysqli_connect_error());
    
    }

?>