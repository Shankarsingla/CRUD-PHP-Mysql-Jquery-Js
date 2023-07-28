function showToast(message) {
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toastMessage');
    toastMessage.textContent = message;

    toast.classList.add('show');
    setTimeout(() => {
        toast.classList.remove('show');
    }, 8000); 
}

function deleteIntern(id) {
    const modal = document.getElementById('confirmationModal');
    const confirmButton = document.getElementById('confirmButton');
    const cancelButton = document.getElementById('cancelButton');
  
    modal.style.display = 'flex';
  
    confirmButton.onclick = function() {
      modal.style.display = 'none';
      $.ajax({
        url: "delete.php",
        type: "POST",
        data: {
          id: id
        },
        success: function (response) {
          response = response.trim();
          if (response === "success") {
            showToast("Intern deleted successfully!", "success");
            setTimeout(function () {
              location.reload();
            }, 1500); 
          } else {
            showToast("Failed to delete intern. Please try again.", "error");
          }
        },
        error: function () {
          showToast("Server error. Please try again later.", "error");
        }
      });
    };
  
    cancelButton.onclick = function() {
      modal.style.display = 'none';
    };
  }

function addIntern() {
    window.location.href = "add_form.php";
}

function updateIntern(id) {
    window.location.href = "update_form.php?id=" + id;
}
