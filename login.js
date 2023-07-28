$(document).ready(function() {
    $("#login-form").submit(function(event) {
        event.preventDefault();

        var email = $("#email").val();
        var password = $("#password").val();

        $.ajax({
            type: "POST",
            url: "login.php",
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                  response=response.trim();
                if (response === "success") {
                 
                    window.location.href = "admin_dashboard.php";
                } 
                else
                {
                    $("#error-container").html("Invalid email or password.");
                }
            },
            error: function() {
                $("#error-container").html("Server error. Please try again later.");
            }
        });
    });
});
