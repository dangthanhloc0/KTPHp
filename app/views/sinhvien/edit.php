<?php include __DIR__ . '/../shares/header.php'; ?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-warning text-white text-center">
            <h2>Sửa Sinh Viên</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="index.php?controller=sinhvien&action=edit&id=<?= htmlspecialchars($sinhvien['MaSV']) ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Mã SV:</label>
                    <input type="text" name="MaSV" value="<?= htmlspecialchars($sinhvien['MaSV']) ?>" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Họ Tên:</label>
                    <input type="text" name="HoTen" value="<?= htmlspecialchars($sinhvien['HoTen']) ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Giới Tính:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="GioiTinh" value="Nam" <?= ($sinhvien['GioiTinh'] == 'Nam') ? 'checked' : '' ?>>
                        <label class="form-check-label">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="GioiTinh" value="Nữ" <?= ($sinhvien['GioiTinh'] == 'Nữ') ? 'checked' : '' ?>>
                        <label class="form-check-label">Nữ</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Ngày Sinh:</label>
                    <input type="date" name="NgaySinh" value="<?= htmlspecialchars($sinhvien['NgaySinh']) ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label>Hình ảnh hiện tại:</label><br>
                    <?php if (!empty($sinhvien['Hinh'])): ?>
                        <img src="<?= htmlspecialchars($sinhvien['Hinh']) ?>" alt="Hình ảnh sinh viên" width="120">
                    <?php else: ?>
                        <p>Chưa có ảnh</p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Chọn ảnh mới:</label>
                    <input type="file" name="HinhMoi" class="form-control-file">
                </div>

                <div class="form-group">
                    <label>Mã Ngành:</label>
                    <input type="text" name="MaNganh" value="<?= htmlspecialchars($sinhvien['MaNganh']) ?>" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="index.php?controller=sinhvien&action=list" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../shares/footer.php'; ?>
