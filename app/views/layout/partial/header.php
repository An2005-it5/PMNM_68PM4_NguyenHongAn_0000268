<?php
$base = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
$currentUrl = isset($_GET['url']) ? trim($_GET['url'], '/') : 'home/index';
$navItems = [
    'home/index' => 'Trang chủ',
    'sinhvien/index' => 'Quản lý sinh viên',
];
?>
<style>
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background:#000;
        color:#fff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        margin: 0;
    }
    .navbar nav a {
        padding:8px 12px;
        border-radius:8px;
        text-decoration:none;
        font-weight:600;
        transition: background .2s ease, color .2s ease;
    }
    .navbar nav a.default-link {
        background:transparent;
        border:1px solid rgba(255,255,255,0.12);
        color:#fff;
    }
    .navbar nav a.active-link {
        background:#10b981;
        color:#000;
    }
    .loading-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        backdrop-filter: blur(3px);
    }
    .loading-overlay.active { display: flex; }
    .spinner {
        width: 50px;
        height: 50px;
        border: 4px solid rgba(255, 255, 255, 0.3);
        border-top: 4px solid #fff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    .loading-text {
        color: #fff;
        font-weight: 600;
        margin-top: 16px;
    }
</style>

<div class="loading-overlay" id="loadingOverlay">
    <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;">
        <div class="spinner"></div>
        <div class="loading-text">Đang tải...</div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadingOverlay = document.getElementById('loadingOverlay');
        document.querySelectorAll('a[href*="home/index"], a[href*="sinhvien/index"]').forEach(link => {
            link.addEventListener('click', function() {
                if (!this.href.includes('auth/logout')) {
                    loadingOverlay.classList.add('active');
                }
            });
        });
        window.addEventListener('load', function() {
            setTimeout(() => loadingOverlay.classList.remove('active'), 300);
        });
        window.addEventListener('beforeunload', function() {
            loadingOverlay.classList.add('active');
        });
    });
</script>

<header class="navbar">
    <div style="max-width:1100px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;padding:12px 16px;gap:16px;">
        <div style="display:flex;align-items:center;gap:12px;">
            <a href="<?php echo $base; ?>home/index" style="display:inline-flex;align-items:center;text-decoration:none;color:inherit;">
                <img src="<?php echo $base; ?>images/logo.jpg" alt="Logo hệ thống" style="height:48px;width:auto;border-radius:6px;object-fit:cover;">
                <div style="margin-left:10px;">
                    <div style="font-size:18px;font-weight:700;">Hệ thống quản lý</div>
                    <div style="font-size:13px;opacity:0.85;margin-top:2px;">Sinh viên</div>
                </div>
            </a>
        </div>

        <nav style="display:flex;align-items:center;gap:10px;flex:1;">
            <?php foreach ($navItems as $url => $label): ?>
                <?php
                    $active = ($currentUrl === $url) ? 'active-link' : 'default-link';
                    if ($url === 'sinhvien/index' && $currentUrl !== 'sinhvien/index' && strpos($currentUrl, 'sinhvien') === 0) {
                        $active = 'active-link';
                    }
                ?>
                <a href="<?php echo $base . $url; ?>" class="<?php echo $active; ?>"><?php echo $label; ?></a>
            <?php endforeach; ?>
        </nav>

        <div style="display:flex;align-items:center;gap:12px;">
            <?php if (isset($_SESSION['username'])): ?>
                <span style="color:#fff;font-weight:600;">Xin chào, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="<?php echo $base; ?>?url=auth/logout" style="display:inline-flex;align-items:center;justify-content:center;padding:8px 12px;border-radius:8px;background:#dc2626;color:#fff;text-decoration:none;font-weight:600;transition:background .2s ease;">Đăng xuất</a>
            <?php endif; ?>
        </div>
    </div>
</header>
