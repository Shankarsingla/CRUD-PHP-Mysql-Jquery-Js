<?php
         include 'connection.php';
         $id=$_POST['id'];
         $sql="DELETE from interns where id='$id'";
         if ($conn->query($sql) === TRUE) {
              echo"success";
         }
         $conn->close();

?>