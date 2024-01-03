$(document).ready(function () {
    $("#current_password").keyup(function (){
        var current_password = $("#current_password").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/check-current-password',
            data: {current_password: current_password},
            success: function(resp) {
                if(resp == "false") {
                    $("#verifyCurrentPassword").html("Current Password is incorrect");
                } else if(resp == "true") {
                    $("#verifyCurrentPassword").html("Current Password is Correct");
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });
});
