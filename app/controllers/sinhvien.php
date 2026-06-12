<?php
require_once '../App/core/Controller.php';

class sinhvien extends Controller
{
    private function redirect($path)
    {
        $base = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
        header('Location: ' . $base . $path);
        exit();
    }

    public function index($limit = 5, $offset = 0, $search = '')
    {
        if (isset($_GET['search'])) {
            $search = trim($_GET['search']);
        }
        if (isset($_GET['limit'])) {
            $limit = intval($_GET['limit']);
        }

        $limit = max(1, intval($limit));
        $offset = max(0, intval($offset));
        $currentPage = max(1, intval(floor($offset / $limit) + 1));
        $sinhvienModel = $this->model('SinhvienModel');
        $result = $sinhvienModel->paging($limit, $offset, $search);

        $this->view('layout/masterlayout', [
            'viewname' => 'sinhvien/index',
            'title' => 'Danh sách sinh viên',
            'sinhvien' => $result['sinhvien'],
            'totalPage' => $result['totalPage'],
            'currentPage' => $currentPage,
            'search' => $search,
            'limit' => $limit
        ]);
    }

    public function create()
    {
        $this->view('layout/masterlayout', [
            'viewname' => 'sinhvien/create',
            'title' => 'Thêm sinh viên'
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('sinhvien/index');
        }

        $mssv = isset($_POST['mssv']) ? trim($_POST['mssv']) : '';
        $hoten = isset($_POST['hoten']) ? trim($_POST['hoten']) : '';
        $gioitinh = isset($_POST['gioitinh']) ? trim($_POST['gioitinh']) : '';

        if ($mssv === '' || $hoten === '') {
            $_SESSION['error'] = 'Vui lòng nhập MSSV và họ tên.';
            $this->redirect('sinhvien/index');
        }

        if (!in_array($gioitinh, ['Nam', 'Nữ'], true)) {
            $_SESSION['error'] = 'Vui lòng chọn giới tính Nam hoặc Nữ.';
            $this->redirect('sinhvien/index');
        }

        $sinhvienModel = $this->model('SinhvienModel');
        if ($sinhvienModel->isMssvExists($mssv)) {
            $_SESSION['error'] = 'MSSV đã tồn tại. Vui lòng chọn mã khác.';
            $this->redirect('sinhvien/index');
        }

        $result = $sinhvienModel->create([
            'mssv' => $mssv,
            'hoten' => $hoten,
            'gioitinh' => $gioitinh
        ]);

        $_SESSION[$result ? 'success' : 'error'] = $result ? 'Thêm sinh viên thành công!' : 'Thêm sinh viên thất bại!';
        $this->redirect('sinhvien/index');
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('sinhvien/index');
        }

        $id = intval($id);
        if ($id <= 0 && isset($_POST['id'])) {
            $id = intval($_POST['id']);
        }

        $mssv = isset($_POST['mssv']) ? trim($_POST['mssv']) : '';
        $hoten = isset($_POST['hoten']) ? trim($_POST['hoten']) : '';
        $gioitinh = isset($_POST['gioitinh']) ? trim($_POST['gioitinh']) : '';

        if ($id <= 0 || $mssv === '' || $hoten === '') {
            $_SESSION['error'] = 'Thông tin sinh viên không hợp lệ.';
            $this->redirect('sinhvien/index');
        }

        if (!in_array($gioitinh, ['Nam', 'Nữ'], true)) {
            $_SESSION['error'] = 'Vui lòng chọn giới tính Nam hoặc Nữ.';
            $this->redirect('sinhvien/index');
        }

        $sinhvienModel = $this->model('SinhvienModel');
        if ($sinhvienModel->isMssvExists($mssv, $id)) {
            $_SESSION['error'] = 'MSSV đã tồn tại. Vui lòng chọn mã khác.';
            $this->redirect('sinhvien/index');
        }

        $result = $sinhvienModel->update($id, [
            'mssv' => $mssv,
            'hoten' => $hoten,
            'gioitinh' => $gioitinh
        ]);

        $_SESSION[$result ? 'success' : 'error'] = $result ? 'Cập nhật sinh viên thành công!' : 'Cập nhật sinh viên thất bại!';
        $this->redirect('sinhvien/index');
    }

    public function delete($id)
    {
        $sinhvienModel = $this->model('SinhvienModel');
        $result = $sinhvienModel->delete(intval($id));
        $_SESSION[$result ? 'success' : 'error'] = $result ? 'Xóa sinh viên thành công!' : 'Xóa sinh viên thất bại!';
        $this->redirect('sinhvien/index');
    }
}
?>
