function showToast(message) {
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toastMessage');
    toastMessage.textContent = message;

    toast.classList.add('show');
    setTimeout(() => {
        toast.classList.remove('show');
    }, 8000); 
}
function canceladd()
{
    window.location.href = "admin_dashboard.php";
}
function previewImage1(event) {
    const input = event.target;
    if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
    const preview = document.getElementById('preview1');
    preview.src = e.target.result;
    preview.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
    }
    }
$(document).ready(function() {
    $("#add-form-data").on("submit",function(e)
    {
      e.preventDefault();
        var formdata=new FormData(this);
        $.ajax({
                url:'add.php', 
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
    