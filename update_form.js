function showToast(message) {
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toastMessage');
    toastMessage.textContent = message;

    toast.classList.add('show');
    setTimeout(() => {
        toast.classList.remove('show');
    }, 8000); 
}
function previewImage(event) {
    const input = event.target;
    if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
    const preview = document.getElementById('preview');
    preview.src = e.target.result;
    preview.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
    }
    }
    function cancelUpdate()
    {
        window.location.href = "admin_dashboard.php";
    } 
    $(document).ready(function() {
        $("#update_form").on("submit",function(e)
        {
          e.preventDefault();
            var formdata=new FormData(this);
            $.ajax({
                    url:'update.php', 
                    type: "POST",
                    data: formdata,
                     processData: false,
                      contentType: false,
                      success: function(response) {
                    
                         showToast(response);
                         setTimeout(function() {
                            window.location.href = "admin_dashboard.php";
                        }, 1500); 
               },
               error: function() {
                   alert("Server error. Please try again later.");
               }
           });
       });
    });
         