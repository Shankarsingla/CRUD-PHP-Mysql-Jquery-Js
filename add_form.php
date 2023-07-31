<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD Record</title>
    <link rel="stylesheet" href="add_form.css">
      
</head>
<body>
<div class="toast" id="toast">
        <div class="toast-message" id="toastMessage"></div>
    </div>   
<div id="add-form">
              <h2>ADD Intern Details</h2>
              
              <form id="add-form-data" method="post">
                <label> Photo</label>
                <input type="file" name="uploaded_file" id="image" onchange="previewImage1(event)"> <br> <br>
                <label>Name:</label>
                <input type="text" id="addname" value="" name="Name" required><br><br>
                <label>Email:</label>
                <input type="text" id="addemail" value="" name="Email" required><br><br>
                <label>Gender:</label>
                <input type="radio" value="Male" name="Gender">Male
                <input type="radio" value="Female" name="Gender">Female
                <input type="radio" value="Other" name="Gender">Other
                <br><br>
                <input type="submit" class="submit" value="ADD">
                <button type="button" onclick="canceladd()">Cancel</button><br><br>
                <img id="preview1" src="#" alt="Preview Image" style="display: none; max-width: 200px; max-height: 200px;">
              </form>
              
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="add_form.js"></script>
            </script>
</body>
</html>
