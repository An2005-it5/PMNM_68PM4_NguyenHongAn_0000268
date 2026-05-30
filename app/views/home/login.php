<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="/QLSV.php/public/css/login.css">
</head>
<body>
  <div class="login-wrapper">
    <div class="login-card">
      <h1>Đăng nhập</h1>
      <p class="lead">Vui lòng nhập tài khoản và mật khẩu của bạn</p>

      <?php if (!empty($error)): ?>
        <div class="error"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>

      <form method="post" action="?url=auth/login" autocomplete="on">
        <div class="form-group">
          <label for="username">Tài khoản</label>
          <input type="text" id="username" name="username" required autofocus>
        </div>

        <div class="form-group">
          <label for="password">Mật khẩu</label>
          <input type="password" id="password" name="password" required>
        </div>

        <button class="btn" type="submit">Đăng nhập</button>
      </form>

      <div class="login-footer">
        <p>Không có tài khoản? <a href="?url=home/register">Đăng ký</a></p>
      </div>
    </div>
  </div>
</body>
</html>