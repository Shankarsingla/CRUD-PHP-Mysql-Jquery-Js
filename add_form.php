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
    <script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/@jsuites/cropper/cropper.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@jsuites/cropper/cropper.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    <link rel="stylesheet" href="add_form.css">
      
</head>
<body>
<div class="toast" id="toast">
        <div class="toast-message" id="toastMessage"></div>
    </div>   
    <div id="add-form">
        <h2>ADD Intern Details</h2>
        <form id="add-form-data" method="post">
            <div style="display: flex;">
                <div id="image-cropper" style="border:1px solid #ccc; margin: 5px;"></div>
                <div id="image-cropper-result"><img style="width:120px; height:120px; margin: 5px;"></div>
            </div>
            <p><input type="button" value="Get cropped image" id="image-getter" class="jbutton dark"></p>
            <input type="hidden" name="cropped_image" id="cropped_image">
            <input type="file" name="uploaded_file" id="image" accept="image/*" style="position: absolute; top: -9999px;">
            <label>Name:</label>
            <input type="text" id="addname" value="" name="Name" required><br><br>
            <label>Email:</label>
            <input type="text" id="addemail" value="" name="Email" required><br><br>
            <label>Gender:</label>
            <input type="radio" value="Male" name="Gender">Male
            <input type="radio" value="Female" name="Gender">Female
            <input type="radio" value="Other" name="Gender">Other
            <br><br>
            <fieldset>
    <legend>Languages:</legend>
    <label><input type="checkbox" name="languages[]" value="English"> English</label>
    <label><input type="checkbox" name="languages[]" value="Spanish"> Spanish</label>
    <label><input type="checkbox" name="languages[]" value="French"> French</label>
    <label><input type="checkbox" name="languages[]" value="Hindi"> Hindi</label>
    <label><input type="checkbox" name="languages[]" value="German"> German</label>
    <label><input type="checkbox" name="languages[]" value="Chinese"> Chinese</label>
</fieldset>
    <br>
    <br>
            <input type="submit" class="submit" value="ADD">
            <button type="button" onclick="canceladd()">Cancel</button><br><br>
            <img id="preview1" src="#" alt="Preview Image" style="display: none; max-width: 200px; max-height: 200px;">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="add_form.js"></script>
    <script>
        cropper(document.getElementById('image-cropper'), {
            area: [200, 200],
            crop: [100, 100],
        });

        document.getElementById('image-getter').onclick = function() {
            var x = document.getElementById('image-cropper-result');
            var croppedImageSrc = document.getElementById('image-cropper').crop.getCroppedImage().src;

            x.children[0].src = croppedImageSrc;
            document.getElementById('cropped_image').value = croppedImageSrc;
        };
</script>

</body>
</html>
