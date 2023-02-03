$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    // $(".table-product").DataTable()
})

function resetLoginValidation() {
    $(".form-text-username").html("");
    $(".form-text-password").html("");
    
    $(".alert-login").html("");
    $(".alert-login").removeClass("alert-danger");
    $(".alert-login").removeClass("alert-success");
    $(".alert-login").hide();
}

function validateLoginForm() {
    let username = $("#username").val();
    let password = $("#password").val();

    if (username == "" && password == "") {
        $(".form-text-username").html("Please enter your username");
        $(".form-text-password").html("Please enter your password");
        return false;
    }

    if (username == "") {
        $(".form-text-username").html("Please enter your username");
        return false;
    }

    if (password == "") {
        $(".form-text-password").html("Please enter your password");
        return false;
    }

    return true;
}

$(".btn-login").click(function() {
    let username = $("#username").val();
    let password = $("#password").val();
    
    resetLoginValidation();
    if (validateLoginForm()) {

        $(".btn-login").prop("disabled", true);
        $(".btn-login").html("Processing...");

        $.ajax({   
            url: "/login/validate",
            type: 'POST',
            data: {
                username: username,
                password: password,
            },
            success: function(response) {
                if (!response.error) {

                    $(".btn-login").prop("disabled", true);
                    $(".btn-login").html("Redirecting...");

                    $(".alert-login").addClass("alert-success");
                    $(".alert-login").html(response.msg);
                    $(".alert-login").show();

                    window.location.href = "/";
                } else {
                    $(".btn-login").prop("disabled", false);
                    $(".btn-login").html("Sign In");

                    $(".alert-login").addClass("alert-danger");
                    $(".alert-login").html(response.msg);
                    $(".alert-login").show();

                    setTimeout(() => {
                        resetLoginValidation();
                    }, 2000);
                }
            }
        });
    }
})