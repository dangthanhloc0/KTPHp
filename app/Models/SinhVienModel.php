<?php
require_once __DIR__ . '/../config/database.php';

class SinhVienModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllSinhVien() {
        $stmt = $this->conn->prepare("SELECT * FROM SinhVien");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getSinhVienById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM SinhVien WHERE MaSV = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

  
    public function addSinhVien($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh) {
        $stmt = $this->conn->prepare("INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                                      VALUES (:MaSV, :HoTen, :GioiTinh, :NgaySinh, :Hinh, :MaNganh)");
        $stmt->bindParam(":MaSV", $MaSV);
        $stmt->bindParam(":HoTen", $HoTen);
        $stmt->bindParam(":GioiTinh", $GioiTinh);
        $stmt->bindParam(":NgaySinh", $NgaySinh);
        $stmt->bindParam(":Hinh", $Hinh);
        $stmt->bindParam(":MaNganh", $MaNganh);
        
        return $stmt->execute();
    }

    public function updateSinhVien($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh) {
        $stmt = $this->conn->prepare("UPDATE SinhVien SET HoTen = :HoTen, GioiTinh = :GioiTinh, NgaySinh = :NgaySinh, Hinh = :Hinh, MaNganh = :MaNganh 
                                      WHERE MaSV = :MaSV");
        $stmt->bindParam(":MaSV", $MaSV);
        $stmt->bindParam(":HoTen", $HoTen);
        $stmt->bindParam(":GioiTinh", $GioiTinh);
        $stmt->bindParam(":NgaySinh", $NgaySinh);
        $stmt->bindParam(":Hinh", $Hinh);
        $stmt->bindParam(":MaNganh", $MaNganh);
        
        return $stmt->execute();
    }

    public function deleteSinhVien($MaSV) {
        $stmt = $this->conn->prepare("DELETE FROM SinhVien WHERE MaSV = :MaSV");
        $stmt->bindParam(":MaSV", $MaSV);
        return $stmt->execute();
    }

    public function getSinhVienByMSSV($mssv) {
        $stmt = $this->conn->prepare("SELECT * FROM sinhvien WHERE MaSV = ?");
        $stmt->execute([$mssv]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>
