<?php
        include 'connection.php';
        if(isset($_GET['id']))
        {
               $id=$_GET['id'];
               $sql="SELECT * from interns where id='$id'";
               $result = $conn->query($sql);
                  if ($result) {
                       $internData = $result->fetch_assoc();
                       $name=$internData['name'];
                       $email=$internData['email'];
                       $gender=$internData['gender'];
                       $photo=$internData['photo'];


        }
        else {
            echo "Error executing the query: " . $conn->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update form</title>
    <style>
          .toast {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #333;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    display: none;
    z-index: 9999;
}

.toast.show {
    display: block;
    animation: fadeInOut 3s ease-in-out;
}

@keyframes fadeInOut {
    0%, 100% { opacity: 0; }
    20%, 80% { opacity: 1; }
}
        </style>

</head>
<body>
<div class="toast" id="toast">
        <div class="toast-message" id="toastMessage"></div>
    </div>   
<div id="update-form">
              <h2>Update Intern Details</h2>
              <form id="update_form" method="post">
              <input type="hidden" id="updateid" value="<?php echo $id; ?>" name="uid">

        <label>Name:</label>
        <input type="text" id="newname" value="<?php echo $name; ?>" name="uname" required><br><br>

       
        <label>Email:</label>
        <input type="text" id="newemail" value="<?php echo $email; ?>" name="uemail" required><br><br>

       
        <label>Gender:</label>
        <input type="radio" value="Male" name="ugender" <?php echo ($gender === 'Male') ? 'checked' : ''; ?>>Male
        <input type="radio" value="Female" name="ugender" <?php echo ($gender === 'Female') ? 'checked' : ''; ?>>Female
        <input type="radio" value="Other" name="ugender" <?php echo ($gender === 'Other') ? 'checked' : ''; ?>>Other
        <br><br>

       
        <label>Current Photo:</label>
        <img src="<?php echo $photo; ?>" alt="Current Photo" style="max-width: 100px; max-height: 100px;"><br><br>

        
        <label>Update Photo:</label>
        <input type="file" name="uploaded_file" id="updateimage" onchange="previewImage(event)">
        <br><br>

        
        <input type="submit" class="submit" value="UPDATE">
        <button type="button" onclick="cancelUpdate()">Cancel</button><br><br>

        <img id="preview" src="#" alt="Preview Image" style="display: none; max-width: 200px; max-height: 200px;">
    </form>

              
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="update_form.js"></script>
</body>
</html>