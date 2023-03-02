$(document).ready(function () {
    $('.remove').click(function () {
        var id = $(this).data('id');
        $.ajax({
            url: baseURL + 'index.php/userDetails',
            method: 'post',
            data: {
                id: id
            },
            dataType: 'json',
            success: function (response) {
                var first_name = response[0].user_name;
                if (confirm("Are you sure you want to remove User: " + first_name)) {
                    window.location.href = "remove_user?id="+id;
                }
            }

        });


    });
    $('.edit').click(function () {
        var id = $(this).data('id');
        //var id = document.getElementById('recipient-name1');

        $.ajax({
            url: baseURL + 'index.php/userDetails',
            method: 'post',
            data: {
                id: id
            },
            dataType: 'json',
            success: function (response) {

                var len = response.length;
                if (len > 0) {
                    
                    // Read values
                    var uname = response[0].id;
                    var first_name = response[0].first_name;
                    var last_name = response[0].last_name;
                    var user_name = response[0].user_name;
                    var user_email = response[0].user_email;
                    var user_password = response[0].user_password;
                    var permissions = response[0].permissions;


                    $('#id').text(uname);
                    $('#id1').val(uname);
                    $('#first_name').val(first_name);
                    $('#last_name').val(last_name);
                    $('#user_name').val(user_name);
                    $('#user_email').val(user_email);
                    $('#user_password').val(user_password);
                    $('#permissions').val(permissions);


                }
            }

        });

    });
});