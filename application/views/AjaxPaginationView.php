<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>CodeIgniter Pagination with AJAX Example</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="row">
            <h3 class="text-center bg-success">AJAX Pagination in CodeIgniter</h3>
            <div id="ajax_content">
                <?php $this->load->view('Data', $results); ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function() {
        paginate();
        function paginate() {
            $('#ajax_links a').click(function() {
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: 'ajax=true',
                    success: function(data) {
                        $('#ajax_content').html(data);
                    }
                });
                return false;
            });
        }
    });
</script>
</body>
</html>
