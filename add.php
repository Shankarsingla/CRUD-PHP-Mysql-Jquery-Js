<?php 
include 'connection.php';
         $username=$_POST['Name'];
         $email=$_POST['Email'];
         $gender=$_POST['Gender'];
         $folder = "../uploads/"; 
         $imagename = $_FILES["uploaded_file"]["name"]; 
         $tempname = $_FILES["uploaded_file"]["tmp_name"]; 
         
         $destination = $folder . $imagename; 
         move_uploaded_file($tempname, $destination);
         session_start();
         $mid=$_SESSION['id'];
         $selectedLanguages = $_POST['languages'];
         $languages = implode(', ', $selectedLanguages);
         $sql="INSERT into interns (name,email,gender,mid,photo,languages) values('$username','$email','$gender','$mid','$destination','$languages')";
         if ($conn->query($sql) === TRUE) {
            echo" Insertion Success";
        } else {
            echo "Error in insertion: " . $conn->error;
        }
        $conn->close();
?>         