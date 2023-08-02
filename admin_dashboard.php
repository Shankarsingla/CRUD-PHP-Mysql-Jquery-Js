<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.html');
    exit;
}
?>
<?php
       include 'connection.php';
       session_start();
       $id=$_SESSION['id'];
       $sql="SELECT * from interns where mid='$id'";
                      $res=$conn->query($sql);
                      

                $output="  <h1> Interns working under Manager</h1>";   
                $output.='<table>
                    <caption> intern details </caption>
                   <tr>
                     <th> photo </th>
                     <th>id </th>
                     <th> name</th>
                     <th> Email</th>
                     <th> Gender</th>
                     <th> Languages </th>
                     <th> UPDATE </th>
                     <th> DELETE </th>
                   </tr>';
                   while($rows = $res->fetch_assoc()) 
                {
                $imagePath = $rows['photo'];
                    $output .= '<tr>';
                    $output .= '<td><img src="' . $imagePath . '" alt="User Image" width="50" height="50" onmouseover="showLargeImage(\'' . $imagePath . '\')" onmouseout="hideLargeImage()"></td>';


                  $output .= '<td>' . $rows['id'] . '</td>';
                    $output .= '<td>' . $rows['name'] . '</td>';
                    $output .= '<td>' . $rows['email'] . '</td>';
                    $output .= '<td>' . $rows['gender'] . '</td>';
                    $output .= '<td>' . $rows['languages'] . '</td>';
                    $output .= '<td><button onclick="updateIntern(' . $rows['id'] . ')">Update</button></td>';
                    $output .= '<td><button onclick="deleteIntern(' . $rows['id'] . ')">Delete</button></td>';

                    
                    $output .= '</tr>';
                }
                $output.= "</table>";
                $output.="<br>";
                $output.="<br>";
                $output.='<button onclick="addIntern()"> Add Record</button>';
                $output .= '<span style="margin-left: 10px;"></span>'; 
                $output .= '<a href="logout.php" class="btn-logout">Logout</a>';
                $conn->close();
                echo $output;
                

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
          
table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ccc;
}
h1
{
    text-align:center;
}

caption {
    font-weight: bold;
    font-size: 24px;
    margin-bottom: 10px;
}

th, td {
    padding: 8px;
    border: 1px solid #ccc;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

button {
    padding: 6px 12px;
    margin: 5px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
td img {
    display: block;
    margin: auto;
    max-width: 50px;
    max-height: 50px;
    border-radius: 50%;
}
.modal {
  display: none;
  position: fixed;
  top: 20px;
  left: 50%;
  transform: translateX(-50%);
  width: 200px;
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

a
{
    background-color: Crimson;  
border-radius: 5px;
color: white;
padding: .5em;
text-decoration: none;
margin-right:30px;
}

.modal-content {
  text-align: center;
}

button {
  margin: 5px;
}
.image-preview-container {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 200px; 
  height: 200px; 
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  text-align: center; 
}

.image-preview-container img {
  max-width: 100%;
  max-height: 100%;
  width: auto;
  height: auto;
  object-fit: contain;
}





        </style>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="dashboard.js"></script>
        <script>
function showLargeImage(imagePath) {
  var imgPreview = document.getElementById("largeImagePreview");
  imgPreview.src = imagePath;
  var container = document.getElementById("imagePreviewContainer");
  container.style.display = "block";
}

function hideLargeImage() {
  var container = document.getElementById("imagePreviewContainer");
  container.style.display = "none";
}
</script>
</head>
<body>
    
<div class="toast" id="toast">
        <div class="toast-message" id="toastMessage"></div>
    </div>
    <div id="confirmationModal" class="modal">
  <div class="modal-content">
    <p>Are you sure you want to delete this intern?</p>
    <button id="confirmButton">Yes</button>
    <button id="cancelButton">Cancel</button>
  </div>
</div>   
<div id="imagePreviewContainer" class="image-preview-container">
    <img id="largeImagePreview" src="" alt="Large Preview">
</div>
</body>
</html>