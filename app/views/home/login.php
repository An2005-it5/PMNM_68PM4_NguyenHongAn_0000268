<?php $baseUrl = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>css/login.css">
</head>
<body>
    <main class="login-page">
        <section class="login-visual">
            <img src="<?php echo $baseUrl; ?>images/login.jpg" alt="Hệ thống quản lý sinh viên">
            <div class="visual-copy">
                <span>HUCE</span>
                <h1>Quản lý sinh viên</h1>
                <p>Database: 68PM34</p>
            </div>
        </section>

        <section class="login-panel">
            <div class="login-card">
                <img class="login-logo" src="<?php echo $baseUrl; ?>images/logo.jpg" alt="Logo">
                <h2>Đăng nhập</h2>
                <p class="lead">Nhập tài khoản để vào hệ thống.</p>

                <?php if (!empty($error)): ?>
                    <div class="error"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>

                <form method="post" action="<?php echo $baseUrl; ?>auth/login" autocomplete="on">
                    <div class="form-group">
                        <label for="username">Tài khoản</label>
                        <input type="text" id="username" name="username" required autofocus placeholder="nguyenhongan">
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" id="password" name="password" required placeholder="0000268">
                    </div>

                    <button class="btn" type="submit">Đăng nhập</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
