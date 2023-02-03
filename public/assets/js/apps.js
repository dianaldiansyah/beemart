$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".input-image").on("change", function(e) {
    var $source = $('.preview-image');
    $source[0].src = URL.createObjectURL(this.files[0]);
    $source.parent()[0].load();
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
});

// PRODUCT FUNCTION

$("form.form-product-add").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: '/product/store',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            if (!res.error) {
                Swal.fire({
                    icon: 'success',
                    title: 'Yeay....',
                    text: res.msg
                }).then(() => {
                    window.location.href = '/product'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: res.msg
                })
            }
        }
    });
});

$("form.form-product-update").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: '/product/update',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            if (!res.error) {
                Swal.fire({
                    icon: 'success',
                    title: 'Yeay....',
                    text: res.msg
                }).then(() => {
                    window.location.href = '/product'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: res.msg
                })
            }
        }
    });
});

function deleteProduct(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/product/delete',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(res) {
                    if (!res.error) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Yeay....',
                            text: res.msg
                        }).then(() => {
                            window.location.href = '/product'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: res.msg
                        })
                    }
                }
            });
        }
    });
}

// END PRODUCT FUNCTION

// CUSTOMER FUNCTION
$("form.form-customer-add").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: '/customer/store',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            if (!res.error) {
                Swal.fire({
                    icon: 'success',
                    title: 'Yeay....',
                    text: res.msg
                }).then(() => {
                    window.location.href = '/customer'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: res.msg
                })
            }
        }
    });
});

$("form.form-customer-update").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: '/customer/update',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            if (!res.error) {
                Swal.fire({
                    icon: 'success',
                    title: 'Yeay....',
                    text: res.msg
                }).then(() => {
                    window.location.href = '/customer'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: res.msg
                })
            }
        }
    });
});

function deleteCustomer(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/customer/delete',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(res) {
                    if (!res.error) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Yeay....',
                            text: res.msg
                        }).then(() => {
                            window.location.href = '/customer'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: res.msg
                        })
                    }
                }
            });
        }
    });
}
// END CUSTOMER FUNCTION

// STAFF FUNCTION
$("form.form-staff-add").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: '/staff/store',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            if (!res.error) {
                Swal.fire({
                    icon: 'success',
                    title: 'Yeay....',
                    text: res.msg
                }).then(() => {
                    window.location.href = '/staff'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: res.msg
                })
            }
        }
    });
});

$("form.form-staff-update").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: '/staff/update',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            if (!res.error) {
                Swal.fire({
                    icon: 'success',
                    title: 'Yeay....',
                    text: res.msg
                }).then(() => {
                    window.location.href = '/staff'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: res.msg
                })
            }
        }
    });
});

function deleteStaff(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/staff/delete',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(res) {
                    if (!res.error) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Yeay....',
                            text: res.msg
                        }).then(() => {
                            window.location.href = '/staff'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: res.msg
                        })
                    }
                }
            });
        }
    });
}
// END CUSTOMER FUNCTION