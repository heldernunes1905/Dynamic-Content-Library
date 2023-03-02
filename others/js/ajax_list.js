$(document).ready(function () {
    $('.remove').click(function () {
        var content_id = $(this).data('id');
        var id_list = $(this).data('list');
        alert(baseUrl);
        $.ajax({
            url: baseURL + 'index.php/imgDetails',
            method: 'post',
            data: {
                content_id: content_id,
                id_list: id_list
            },
            dataType: 'json',
            success: function (response) {
                var title = response[0].title;
                if (confirm("Are you sure you want to remove Content: " + title)) {
                    window.location.href = "remove_img?content_id="+content_id;
                }
            }

        });


    });
    $('.edit').click(function () {
        var id_stick = $(this).data('id');
        //var id = document.getElementById('recipient-name1');
        
        $.ajax({
            url: baseURL + 'index.php/imgDetails',
            method: 'post',
            data: {
                id_stick: id_stick
            },
            dataType: 'json',
            success: function (response) {

                var len = response.length;
                if (len > 0) {
                    
                    // Read values
                    var uname = response[0].id_stick;
                    var altImg = response[0].altImg;
                    var imgPath = response[0].imgPath;
                    var imgTitle = response[0].imgTitle;
                    var imgdescricao = response[0].imgdescricao;
                    var idUser = response[0].user_name;
                    
                    console.log(response);
                    $('#id').text(uname);
                    $('#id1').val(uname);
                    $('#altImg').val(altImg);
                    document.getElementById("imgPath").src = '../uploads/'+imgPath;
                    $('#imgTitle').val(imgTitle);
                    $('#imgdescricao').val(imgdescricao);
                    document.getElementById("idUser").innerHTML = 'Owner: '+idUser;
                }
            }

        });

    });
});