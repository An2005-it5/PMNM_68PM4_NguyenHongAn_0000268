<?php $baseUrl = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']); ?>
<div style="min-height:100vh;padding-top:80px;background:#f3f4f6;">
    <div style="background:#fce7f3;padding:40px 20px;text-align:center;">
        <div style="max-width:900px;margin:0 auto;background:#fff;border-radius:16px;padding:56px 20px;box-shadow:0 18px 40px rgba(15,23,42,0.08);border:1px solid #d1d5db;">
            <img src="<?php echo $baseUrl; ?>images/trangchu.png" alt="Trang chủ" style="max-width:100%;height:auto;border-radius:12px;margin-bottom:24px;" />
            <h2 style="font-size:26px;margin:20px 0 8px;color:#111827;font-weight:800;">Hệ thống quản lý sinh viên HUCE</h2>
            <p style="font-size:16px;color:#6b7280;">Database kết nối: <strong>68pm34</strong>. Hãy chọn chức năng quản lý sinh viên để bắt đầu.</p>
        </div>
    </div>

    <div style="background:#f3f4f6;padding:40px 20px;text-align:center;">
        <div style="max-width:1000px;margin:0 auto;">
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:24px;">
                <a href="<?php echo $baseUrl; ?>sinhvien/index" class="home-card" style="display:flex;flex-direction:column;align-items:center;justify-content:center;padding:32px 20px;background:#fff;border-radius:16px;text-decoration:none;transition:transform .3s ease, box-shadow .3s ease;cursor:pointer;box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                    <div style="display:flex;align-items:center;justify-content:center;width:64px;height:64px;background:#2563eb;color:#fff;border-radius:12px;font-size:24px;font-weight:700;margin-bottom:16px;">SV</div>
                    <h3 style="color:#111827;font-size:18px;font-weight:700;margin:0;">Quản lý sinh viên</h3>
                </a>
            </div>
        </div>
    </div>

    <style>
        .home-card:hover {transform: translateY(-4px);box-shadow:0 12px 24px rgba(0,0,0,0.15)!important;}
    </style>
</div>
