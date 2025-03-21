<?php include __DIR__ . '/../shares/header.php'; ?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center bg-primary text-white">
            <h2>Chi tiết Sinh Viên</h2>
        </div>
        <div class="card-body">
            <p><strong>Mã SV:</strong> <?= htmlspecialchars($sinhvien['MaSV']) ?></p>
            <p><strong>Họ Tên:</strong> <?= htmlspecialchars($sinhvien['HoTen']) ?></p>
            <p><strong>Giới Tính:</strong> <?= htmlspecialchars($sinhvien['GioiTinh']) ?></p>
            <p><strong>Ngày Sinh:</strong> <?= htmlspecialchars($sinhvien['NgaySinh']) ?></p>
            <p><strong>Hình Ảnh:</strong></p>
            <img src="<?= htmlspecialchars($sinhvien['Hinh']) ?>" alt="Hình Sinh Viên" class="img-thumbnail" width="150">
        </div>
        <div class="card-footer text-center">
            <a href="index.php?controller=sinhvien&action=list" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../shares/footer.php'; ?>
