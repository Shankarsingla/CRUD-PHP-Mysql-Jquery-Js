<?php
$server="localhost";
         $username="root";
         $password="root";
         $database="MyDB";
         $conn=new mysqli($server,$username,$password,$database);
         if($conn->connect_error)
         {
            die("error in connecting" .$conn->connect_error);
         }
?>         