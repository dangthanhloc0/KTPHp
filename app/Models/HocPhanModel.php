<?php
require_once __DIR__ . '/../config/database.php';

class HocPhanModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllHocPhan() {
        $stmt = $this->conn->prepare("SELECT * FROM HocPhan");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result ;
    }

    public function getHocPhanById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM hocphan WHERE MaHP = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


      // Lưu học phần đã đăng ký vào database
      public function saveHocPhan($hocPhanIds, $maSV) {
        try {
            $this->conn->beginTransaction(); // Bắt đầu transaction để đảm bảo tính toàn vẹn dữ liệu
    
            // 1. Chèn vào bảng DangKy
            $stmt = $this->conn->prepare("INSERT INTO DangKy (NgayDK, MaSV) VALUES (NOW(), ?)");
            $stmt->execute([$maSV]);
    
            // 2. Lấy MaDK vừa tạo
            $maDK = $this->conn->lastInsertId();
    
            // 3. Chèn dữ liệu vào bảng ChiTietDangKy & Cập nhật số lượng học phần
            $stmtChiTiet = $this->conn->prepare("INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES (?, ?)");
            $stmtCapNhat = $this->conn->prepare("UPDATE HocPhan SET SoLuong = SoLuong - 1 WHERE MaHP = ? AND SoLuong > 0");
    
            foreach ($hocPhanIds as $maHP) {
                // Cập nhật số lượng học phần trước khi đăng ký
                $stmtCapNhat->execute([$maHP]);
    
                // Kiểm tra nếu số lượng còn thì mới chèn vào bảng ChiTietDangKy
                if ($stmtCapNhat->rowCount() > 0) {
                    $stmtChiTiet->execute([$maDK, $maHP]);
                } else {
                    throw new Exception("Học phần $maHP đã hết chỗ.");
                }
            }
    
            $this->conn->commit(); // Xác nhận transaction
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack(); // Nếu có lỗi, hủy tất cả thay đổi
            return "Lỗi: " . $e->getMessage();
        }
    }
    
    
}
?>
