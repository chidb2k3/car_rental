<!DOCTYPE html>
<html>
<head>
    <title>Chọn Ngày và Giờ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
</head>
<body>
    <form>
        <label for="ngay_gio">Chọn Ngày và Giờ:</label>
        <input type="text" id="ngay_gio" name="ngay_gio">
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#ngay_gio').datetimepicker({
                format: 'Y-m-d H:i', // Định dạng ngày và giờ
                step: 30 // Bước nhảy của thời gian (đơn vị: phút)
            });
        });
    </script>
</body>
</html>
