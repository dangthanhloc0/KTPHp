<?php
require_once __DIR__ . '/../Models/SinhVienModel.php';

class SinhVienController {
    private $model;

    public function __construct() {
        $this->model = new SinhVienModel();
    }

    // ✅ Hiển thị danh sách sinh viên
    public function index() {
        $sinhviens = $this->model->getAllSinhVien();
        include __DIR__ . '/../views/sinhvien/index.php';
        exit(); 
    }

    // ✅ Xem chi tiết sinh viên
    public function detail() {
        if (!isset($_GET['id'])) {
            die("ID sinh viên không hợp lệ!");
        }
        $sinhvien = $this->model->getSinhVienById($_GET['id']);
        include __DIR__ . '/../views/sinhvien/detail.php';
        exit(); 
    }

    // ✅ Thêm sinh viên
    public function add() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Lấy dữ liệu từ form
            $MaSV = $_POST['MaSV'];
            $HoTen = $_POST['HoTen'];
            $GioiTinh = $_POST['GioiTinh'];
            $NgaySinh = $_POST['NgaySinh'];
            $MaNganh = $_POST['MaNganh'];
            
            // Xử lý upload hình ảnh
            $Hinh = ""; // Giá trị mặc định nếu không có ảnh
            if (!empty($_FILES['Hinh']['name'])) {
                $targetDir = "public/image/";  // Thư mục lưu ảnh
                $fileName = time() . "_" . basename($_FILES['Hinh']['name']); // Đặt tên file với timestamp
                $targetFilePath = $targetDir . $fileName; 
    
                // Kiểm tra định dạng file hợp lệ
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                $allowTypes = ["jpg", "jpeg", "png", "gif"];
    
                if (in_array(strtolower($fileType), $allowTypes)) {
                    if (move_uploaded_file($_FILES['Hinh']['tmp_name'], $targetFilePath)) {
                        $Hinh = $targetFilePath; // Lưu đường dẫn ảnh vào database
                    } else {
                        echo "Lỗi khi tải ảnh lên!";
                        exit;
                    }
                } else {
                    echo "Chỉ cho phép các file ảnh JPG, JPEG, PNG, GIF.";
                    exit;
                }
            }
    
            // Gọi model để thêm sinh viên vào database
            $this->model->addSinhVien($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh);
    
            // Chuyển hướng về danh sách sinh viên
            header("Location: index.php?controller=sinhvien&action=list");
            exit();
        }
    
        // Load giao diện thêm sinh viên
        include __DIR__ . '/../views/sinhvien/add.php';
        exit();
    }
    

    // ✅ Chỉnh sửa sinh viên
    public function edit() {
        if (!isset($_GET['id'])) {
            die("ID sinh viên không hợp lệ!");
        }
    
        // Lấy thông tin sinh viên từ database
        $sinhvien = $this->model->getSinhVienById($_GET['id']);
    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $maSV = $_POST['MaSV'];
            $hoTen = $_POST['HoTen'];
            $gioiTinh = $_POST['GioiTinh'];
            $ngaySinh = $_POST['NgaySinh'];
            $maNganh = $_POST['MaNganh'];
    
            // Kiểm tra nếu người dùng tải ảnh mới lên
            if (!empty($_FILES['HinhMoi']['name'])) {
                $targetDir = "public/image/"; // Thư mục lưu ảnh
                $fileName = time() . "_" . basename($_FILES["HinhMoi"]["name"]); // Đổi tên ảnh để tránh trùng
                $targetFilePath = $targetDir . $fileName;
    
                // Kiểm tra định dạng file
                $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $allowedTypes = array("jpg", "jpeg", "png", "gif");
    
                if (in_array($fileType, $allowedTypes)) {
                    if (move_uploaded_file($_FILES["HinhMoi"]["tmp_name"], $targetFilePath)) {
                        $hinh = $targetFilePath; // Cập nhật ảnh mới
                    } else {
                        echo "Lỗi khi tải ảnh lên.";
                        return;
                    }
                } else {
                    echo "Chỉ chấp nhận định dạng JPG, JPEG, PNG, GIF.";
                    return;
                }
            } else {
                $hinh = $sinhvien['Hinh']; // Giữ nguyên ảnh cũ nếu không có ảnh mới
            }
    
            // Cập nhật dữ liệu sinh viên
            $this->model->updateSinhVien($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh);
    
            // Chuyển hướng về danh sách sau khi cập nhật thành công
            header("Location: index.php?controller=sinhvien&action=list");
            exit();
        }
    
        include __DIR__ . '/../views/sinhvien/edit.php';
        exit();
    }
    

    // ✅ Xóa sinh viên
    public function delete() {
        if (!isset($_GET['id'])) {
            die("ID sinh viên không hợp lệ!");
        }
        $this->model->deleteSinhVien($_GET['id']);
        header("Location: index.php?controller=sinhvien&action=list");
        exit();
    }
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $mssv = $_POST['mssv'];
            $sinhvien = $this->model->getSinhVienByMSSV($mssv);

            if ($sinhvien) {
                $_SESSION['sinhvien'] = $sinhvien;
                header("Location: index.php?controller=sinhvien&action=list");
                exit();
            } else {
                echo "MSSV không tồn tại!";
            }
        }
        include __DIR__ . '/../views/auth/login.php';
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?controller=sinhvien&action=login");
        exit();
    }
}

