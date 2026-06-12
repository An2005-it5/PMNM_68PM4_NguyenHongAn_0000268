<?php $baseUrl = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']); ?>
<div style="max-width:1040px;margin:24px auto;">
    <div style="display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:20px;flex-wrap:wrap;">
        <div>
            <h1 style="margin:0;font-size:2rem;color:#111827;"><?php echo htmlspecialchars($title); ?></h1>
            <p style="margin:6px 0 0;color:#4b5563;">Quản lý danh sách sinh viên trong database 68PM34.</p>
        </div>
        <button id="openSvModal" type="button" style="display:inline-flex;padding:12px 18px;background:#2563eb;color:#fff;border:0;border-radius:8px;font-weight:700;cursor:pointer;">Thêm sinh viên</button>
    </div>

    <?php if (session_status() !== PHP_SESSION_ACTIVE) session_start(); ?>
    <?php if (!empty($_SESSION['success'])): ?>
        <div style="margin-bottom:16px;padding:14px 18px;border-radius:8px;background:#ecfdf5;color:#065f46;border:1px solid #10b981;">
            <?php echo htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['error'])): ?>
        <div style="margin-bottom:16px;padding:14px 18px;border-radius:8px;background:#fee2e2;color:#991b1b;border:1px solid #ef4444;">
            <?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <form method="get" action="<?php echo $baseUrl; ?>sinhvien/index" style="display:flex;gap:10px;margin-bottom:16px;background:#fff;border:1px solid #e5e7eb;border-radius:8px;padding:14px;">
        <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Tìm theo MSSV hoặc họ tên" style="flex:1;padding:11px 12px;border:1px solid #d1d5db;border-radius:8px;">
        <button type="submit" style="padding:11px 16px;border:0;border-radius:8px;background:#111827;color:#fff;font-weight:700;">Tìm kiếm</button>
    </form>

    <div id="svModal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);justify-content:center;align-items:center;z-index:9999;">
        <div style="background:#fff;border-radius:8px;padding:20px;width:420px;max-width:90%;position:relative;">
            <button id="closeSvModal" style="position:absolute;right:10px;top:8px;background:transparent;border:none;font-size:20px;cursor:pointer;">&times;</button>
            <h2 style="margin-top:0">Thêm sinh viên</h2>
            <form action="<?php echo $baseUrl; ?>sinhvien/store" method="post">
                <div style="margin-bottom:10px;"><label>MSSV</label><br><input type="text" name="mssv" required style="width:100%;padding:8px;"></div>
                <div style="margin-bottom:10px;"><label>Họ và tên</label><br><input type="text" name="hoten" required style="width:100%;padding:8px;"></div>
                <div style="margin-bottom:10px;"><label>Giới tính</label><br>
                    <select name="gioitinh" required style="width:100%;padding:8px;">
                        <option value="">Chọn giới tính</option><option value="Nam">Nam</option><option value="Nữ">Nữ</option>
                    </select>
                </div>
                <button type="submit" style="padding:8px 12px;border:none;background:#2563eb;color:#fff;">Lưu</button>
            </form>
        </div>
    </div>

    <div id="editSvModal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);justify-content:center;align-items:center;z-index:9999;">
        <div style="background:#fff;border-radius:8px;padding:20px;width:420px;max-width:90%;position:relative;">
            <button id="closeEditSvModal" style="position:absolute;right:10px;top:8px;background:transparent;border:none;font-size:20px;cursor:pointer;">&times;</button>
            <h2 style="margin-top:0">Sửa sinh viên</h2>
            <form id="editSvForm" method="post">
                <input type="hidden" id="edit_id" name="id">
                <div style="margin-bottom:10px;"><label>MSSV</label><br><input type="text" id="edit_mssv" name="mssv" required style="width:100%;padding:8px;"></div>
                <div style="margin-bottom:10px;"><label>Họ và tên</label><br><input type="text" id="edit_hoten" name="hoten" required style="width:100%;padding:8px;"></div>
                <div style="margin-bottom:10px;"><label>Giới tính</label><br>
                    <select id="edit_gioitinh" name="gioitinh" required style="width:100%;padding:8px;">
                        <option value="">Chọn giới tính</option><option value="Nam">Nam</option><option value="Nữ">Nữ</option>
                    </select>
                </div>
                <button type="submit" style="padding:8px 12px;border:none;background:#2563eb;color:#fff;">Lưu</button>
            </form>
        </div>
    </div>

    <table style="width:100%;border-collapse:collapse;background:#fff;">
        <thead style="background:#1f2937;color:#fff;">
            <tr>
                <th style="padding:14px;">STT</th>
                <th style="padding:14px;">MSSV</th>
                <th style="padding:14px;">Họ và tên</th>
                <th style="padding:14px;">Giới tính</th>
                <th style="padding:14px;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($sinhvien)): $stt = 1; foreach ($sinhvien as $sv): ?>
                <tr style="border-bottom:1px solid #e5e7eb;">
                    <td style="padding:14px;"><?php echo $stt++; ?></td>
                    <td style="padding:14px;"><?php echo htmlspecialchars($sv['MSSV']); ?></td>
                    <td style="padding:14px;"><?php echo htmlspecialchars($sv['HoTen']); ?></td>
                    <td style="padding:14px;"><?php echo htmlspecialchars($sv['GioiTinh']); ?></td>
                    <td style="padding:14px;">
                        <button type="button" class="editStudentBtn" data-id="<?php echo $sv['ID']; ?>" data-mssv="<?php echo htmlspecialchars($sv['MSSV']); ?>" data-hoten="<?php echo htmlspecialchars($sv['HoTen']); ?>" data-gioitinh="<?php echo htmlspecialchars($sv['GioiTinh']); ?>" style="padding:8px 12px;border:0;background:#10b981;color:#fff;cursor:pointer;">Sửa</button>
                    </td>
                </tr>
            <?php endforeach; else: ?>
                <tr><td colspan="5" style="padding:24px;text-align:center;">Không có dữ liệu sinh viên.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<script>
var baseUrl = '<?php echo $baseUrl; ?>';
(function(){
    var modal = document.getElementById('svModal');
    var editModal = document.getElementById('editSvModal');
    var editForm = document.getElementById('editSvForm');
    document.getElementById('openSvModal').onclick = function(){ modal.style.display = 'flex'; };
    document.getElementById('closeSvModal').onclick = function(){ modal.style.display = 'none'; };
    document.getElementById('closeEditSvModal').onclick = function(){ editModal.style.display = 'none'; };
    document.querySelectorAll('.editStudentBtn').forEach(function(btn){
        btn.onclick = function(){
            document.getElementById('edit_id').value = btn.getAttribute('data-id');
            document.getElementById('edit_mssv').value = btn.getAttribute('data-mssv');
            document.getElementById('edit_hoten').value = btn.getAttribute('data-hoten');
            document.getElementById('edit_gioitinh').value = btn.getAttribute('data-gioitinh');
            editForm.action = baseUrl + 'sinhvien/update/' + btn.getAttribute('data-id');
            editModal.style.display = 'flex';
        };
    });
})();
</script>
