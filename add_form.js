function showToast(message) {
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toastMessage');
    toastMessage.textContent = message;

    toast.classList.add('show');
    setTimeout(() => {
        toast.classList.remove('show');
    }, 8000);
}
function dataURLtoBlob(dataURL) {
  var arr = dataURL.split(','), mime = arr[0].match(/:(.*?);/)[1];
  var bstr = atob(arr[1]);
  var n = bstr.length;
  var u8arr = new Uint8Array(n);
  while (n--) {
    u8arr[n] = bstr.charCodeAt(n);
  }
  return new Blob([u8arr], { type: mime });
}

function canceladd() {
    window.location.href = "admin_dashboard.php";
}

$(document).ready(function() {
    $("#add-form-data").on("submit", function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        var croppedImageSrc = document.getElementById('cropped_image').value;
    var croppedImageBlob = dataURLtoBlob(croppedImageSrc);
    var fileName = "cropped_image.png";
    var croppedImageFile = new File([croppedImageBlob], fileName);
    formdata.append('uploaded_file', croppedImageFile);
        $.ajax({
            url: 'add.php',
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(response) {
                showToast(response);
                setTimeout(function() {
                    window.location.href = "admin_dashboard.php";
                }, 1500);
                //window.location.href = "admin_dashboard.php";
            },
            error: function() {
                showToast("Server error. Please try again later.");
            }
        });
    });
});

