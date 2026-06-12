
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo isset($title) ? $title : 'Default Title'; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            min-height: 100%;
            width: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            background: #f8fafc;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .layout-side {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            width: 220px;
            max-width: 220px;
            opacity: 0.18;
            z-index: 1;
            pointer-events: none;
        }

        .layout-side-left {
            left: 0;
        }

        .layout-side-right {
            right: 0;
        }

        .layout-side-card {
            width: 100%;
            overflow: hidden;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 60px rgba(15, 23, 42, 0.08);
        }

        .layout-side-card img {
            display: block;
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .layout-side-label {
            padding: 12px 14px;
            font-size: 0.85rem;
            color: #334155;
            text-align: center;
            font-weight: 700;
        }

        .content {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 100px 22px 40px;
            flex: 1 0 auto;
            position: relative;
            z-index: 2;
        }
    </style>
</head>
<body>
    <?php require_once '../app/views/layout/partial/side-left.php'; ?>
    <?php require_once '../app/views/layout/partial/side-right.php'; ?>
    <div><?php require_once '../app/views/layout/partial/header.php'; ?></div>
    <div class="content">
        <?php require_once '../app/views/' . $viewname . '.php'; ?>
    </div>
    <div><?php require_once '../app/views/layout/partial/footer.php'; ?></div>
</body>
</html>