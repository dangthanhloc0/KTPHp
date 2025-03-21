<?php
require_once __DIR__ . '/../Models/HocPhanModel.php';

class HocPhanController {
    private $model;

    public function __construct() {
        $this->model = new HocPhanModel();
    }

    // ✅ Hiển thị danh sách học phần
    public function index() {
        $hocphans = $this->model->getAllHocPhan();
        include __DIR__ . '/../views/hocphan/index.php';
        exit();
    }

    // Xem danh sách học phần đã đăng ký
    public function viewCart() {
      
        $dangKy = $_SESSION['dang_ky'] ?? [];
        include __DIR__ . '/../views/hocphan/registerHp.php';
        exit();
    }


    // Đăng ký học phần vào session
    public function register() {
      
        if (!isset($_GET['id'])) {
            die("ID học phần không hợp lệ!");
        }

        $id = $_GET['id'];
        $hocphan = $this->model->getHocPhanById($id);

        if (!$hocphan) {
            die("Học phần không tồn tại!");
        }

        $_SESSION['dang_ky'][$id] = $hocphan;

        header("Location: index.php?controller=hocphan&action=view_cart");
        exit();
    }

    // Xóa 1 học phần đã đăng ký
    public function remove() {
        if (!isset($_GET['id'])) {
            die("ID học phần không hợp lệ!");
        }

        $id = $_GET['id'];
        unset($_SESSION['dang_ky'][$id]);

        header("Location: index.php?controller=hocphan&action=view_cart");
        exit();
    }

    // Xóa tất cả học phần đã đăng ký
    public function clearAll() {
        unset($_SESSION['dang_ky']);

        header("Location: index.php?controller=hocphan&action=view_cart");
        exit();
    }

    // Lưu học phần đã đăng ký vào database
    public function save() {
        if (empty($_SESSION['dang_ky'])) {
            die("Không có học phần nào để lưu!");
        }
    
        if (!isset($_SESSION['sinhvien']['MaSV'])) {
            die("Bạn chưa đăng nhập!");
        }
    
        $maSV = $_SESSION['sinhvien']['MaSV']; // Lấy ID sinh viên từ session
        $hocPhanIds = array_column($_SESSION['dang_ky'], 'MaHP'); // Lấy danh sách ID học phần
    
        // Lưu vào database
        $this->model->saveHocPhan($hocPhanIds, $maSV);
    
        unset($_SESSION['dang_ky']); // Xóa session sau khi lưu
    
        include __DIR__ . '/../views/hocphan/save.php';
        exit();
    }
    
}

