<?php 
include __DIR__ . '/../shares/header.php'; 


// Kiểm tra nếu sinh viên đã đăng nhập
$sinhvien = isset($_SESSION['sinhvien']) ? $_SESSION['sinhvien'] : null;
?>

<div class="container mt-4">
    <h3 class="text-center text-primary">Học phần đã đăng ký</h3>

    <!-- Kiểm tra nếu sinh viên đã đăng nhập -->
    <?php if ($sinhvien): ?>
        <div class="card mb-4 p-3">
            <div class="row">
                <!-- Phần Ảnh Sinh Viên -->
                <div class="col-md-4 text-center">
                    <img src="<?= htmlspecialchars($sinhvien['Hinh'] ?? 'default-avatar.png') ?>" 
                         alt="Ảnh sinh viên" 
                         class="img-fluid rounded-circle shadow-sm" 
                         style="width: 150px; height: 150px; object-fit: cover;">
                </div>

                <!-- Phần Thông Tin Sinh Viên -->
                <div class="col-md-8">
                    <h5 class="text-info">Thông tin sinh viên</h5>
                    <p><strong>Mã SV:</strong> <?= htmlspecialchars($sinhvien['MaSV']) ?></p>
                    <p><strong>Họ Tên:</strong> <?= htmlspecialchars($sinhvien['HoTen']) ?></p>
                    <p><strong>Giới Tính:</strong> <?= htmlspecialchars($sinhvien['GioiTinh']) ?></p>
                    <p><strong>Ngày Sinh:</strong> <?= htmlspecialchars($sinhvien['NgaySinh']) ?></p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p class="text-center text-danger">Vui lòng đăng nhập để xem học phần đã đăng ký!</p>
    <?php endif; ?>

    <!-- Hiển thị danh sách học phần -->
    <?php if (!empty($dangKy)): ?>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Mã Học Phần</th>
                    <th>Tên Học Phần</th>
                    <th class="text-center">Số Tín Chỉ</th>
                    <th class="text-center">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $tongTinChi = 0;
                $soLuongHocPhan = count($dangKy); 
                foreach ($dangKy as $hp): 
                    $tongTinChi += $hp['SoTinChi'];
                ?>
                    <tr>
                        <td><?= htmlspecialchars($hp['MaHP']) ?></td>
                        <td><?= htmlspecialchars($hp['TenHP']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($hp['SoTinChi']) ?></td>
                        <td class="text-center">
                            <a href="index.php?controller=hocphan&action=remove&id=<?= htmlspecialchars($hp['MaHP']) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa học phần này?');">
                                Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p class="font-weight-bold">Tổng số học phần: <span class="text-primary"><?= $soLuongHocPhan ?> học phần</span></p>
        <p class="font-weight-bold">Tổng số tín chỉ: <span class="text-success"><?= $tongTinChi ?> tín chỉ</span></p>

        <div class="text-center">
            <a href="index.php?controller=hocphan&action=clearAll" 
               class="btn btn-warning btn-sm"
               onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả học phần?');">
                Xóa tất cả
            </a>

            <a href="index.php?controller=hocphan&action=save" 
               class="btn btn-primary btn-sm">
                Lưu vào database
            </a>
        </div>
    <?php else: ?>
        <p class="text-center text-danger">Chưa đăng ký học phần nào!</p>
    <?php endif; ?>

    <div class="text-center mt-3">
        <a href="index.php?controller=hocphan&action=list" class="btn btn-secondary">
            Quay lại danh sách học phần
        </a>
    </div>
</div>

<?php include __DIR__ . '/../shares/footer.php'; ?>
