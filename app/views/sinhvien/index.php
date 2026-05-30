<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <h1>Danh sách sinh viên</h1>

    <?php if (!empty($sinhviens)): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
    
                <th>STT</th>
                <th>MSSV</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
            </tr>
            <?php foreach ($sinhviens as $index => $sinhvien): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($sinhvien['MSSV']); ?></td>
                    <td><?php echo htmlspecialchars($sinhvien['HoTen']); ?></td>
                    <td><?php echo htmlspecialchars($sinhvien['GioiTinh']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Không có dữ liệu sinh viên.</p>
    <?php endif; ?>
</body>
</html>