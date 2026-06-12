<?php $baseUrl = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']); ?>
<div style="max-width:640px;margin:32px auto;padding:22px;background:#fff;border-radius:8px;box-shadow:0 18px 40px rgba(15,23,42,0.08);border:1px solid #e5e7eb;">
    <h1 style="font-size:2rem;margin-bottom:8px;color:#111827;">Thêm sinh viên</h1>
    <form action="<?php echo $baseUrl; ?>sinhvien/store" method="post" style="display:grid;gap:18px;">
        <label>
            <span style="display:block;margin-bottom:8px;font-weight:600;color:#374151;">MSSV</span>
            <input type="text" name="mssv" required style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
        </label>
        <label>
            <span style="display:block;margin-bottom:8px;font-weight:600;color:#374151;">Họ và tên</span>
            <input type="text" name="hoten" required style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
        </label>
        <label>
            <span style="display:block;margin-bottom:8px;font-weight:600;color:#374151;">Giới tính</span>
            <select name="gioitinh" required style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;background:#fff;">
                <option value="">Chọn giới tính</option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </label>
        <div style="display:flex;justify-content:space-between;gap:12px;flex-wrap:wrap;">
            <a href="<?php echo $baseUrl; ?>sinhvien/index" style="display:inline-flex;align-items:center;justify-content:center;padding:12px 18px;border-radius:8px;border:1px solid #d1d5db;color:#374151;text-decoration:none;">Quay về</a>
            <button type="submit" style="display:inline-flex;align-items:center;justify-content:center;padding:12px 18px;border-radius:8px;border:none;background:#2563eb;color:#fff;font-weight:700;">Lưu</button>
        </div>
    </form>
</div>
