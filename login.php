<?php
               include 'connection.php';
               if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $email = $_POST["email"];
                $password = $_POST["password"];
                $sql="SELECT * from Teamlead where email='$email' and password='$password'";
                $result = $conn->query($sql);

    if ($result->num_rows === 1) {
       
        $user = $result->fetch_assoc();
        session_start();
        $_SESSION['id']=$user['id'];
        echo "success";
        

        
    } else {
        echo "invalid_credentials";
    }
}
$conn->close();
?>