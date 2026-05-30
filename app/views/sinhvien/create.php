<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên mới</title>
</head>
<body>
    <h1>Thêm sinh viên mới</h1>
    <?php $baseUrl = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']); ?>
    <form action="<?php echo $baseUrl; ?>sinhvien/store" method="post">
        <div>
            <label for="ID">ID:</label>
            <input type="text" id="ID" name="ID" required>
        </div>
        <div>
            <label for="MSSV">MSSV:</label>
            <input type="text" id="MSSV" name="MSSV" required>
        </div>
        <div>
            <label for="HoTen">Họ Tên:</label>
            <input type="text" id="HoTen" name="HoTen" required>
        </div>
        <div>
            <label for="GioiTinh">Giới Tính:</label>
            <input type="text" id="GioiTinh" name="GioiTinh" required>
        </div>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>