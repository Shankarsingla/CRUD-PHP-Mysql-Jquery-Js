<?php 
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['uname'];
    $email = $_POST['uemail'];
    $gender = $_POST['ugender'];
    $id = $_POST['uid'];
    $selectedLanguages = $_POST['languages'];
    $languages = implode(', ', $selectedLanguages);

    if (!empty($_FILES["uploaded_file"]["name"])) {
        $folder = "../uploads/"; 
        $imagename = $_FILES["uploaded_file"]["name"]; 
        $tempname = $_FILES["uploaded_file"]["tmp_name"]; 
        $destination = $folder . $imagename; 
        move_uploaded_file($tempname, $destination);
     $sql = "UPDATE interns SET name='$username', email='$email', gender='$gender', photo='$destination',languages='$languages' WHERE id='$id'";
    }
     else
     {
        $sql = "UPDATE interns SET name='$username', email='$email', gender='$gender',languages='$languages' WHERE id='$id'";
     }

    if ($conn->query($sql) === TRUE) {
        echo "Updation successful";
    } else {
        echo "Error in updation: " . $conn->error;
    }
}

$conn->close();
?>
