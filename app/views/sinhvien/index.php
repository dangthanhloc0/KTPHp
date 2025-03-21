<?php include __DIR__ . '/../shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="text-center mb-3">Danh sách Sinh Viên</h2>
    
    <a href="index.php?controller=sinhvien&action=add" class="btn btn-primary mb-3">Thêm Sinh Viên</a>
    
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Mã SV</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>Ngày Sinh</th>
                <th>Mã ngành</th>
                <th>Hình Ảnh</th>  <!-- Thêm cột hình ảnh -->
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinhviens as $sv): ?>
                <tr>
                    <td><?= htmlspecialchars($sv['MaSV']) ?></td>
                    <td><?= htmlspecialchars($sv['HoTen']) ?></td>
                    <td><?= htmlspecialchars($sv['GioiTinh']) ?></td>
                    <td><?= htmlspecialchars($sv['NgaySinh']) ?></td>
                    <td><?= htmlspecialchars($sv['MaNganh']) ?></td>
                    <td>
                        <?php if (!empty($sv['Hinh'])): ?>
                            <img src="<?= htmlspecialchars($sv['Hinh']) ?>" alt="Hình ảnh sinh viên" width="100">
                        <?php else: ?>
                            <p>Chưa có ảnh</p>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a href="index.php?controller=sinhvien&action=detail&id=<?= $sv['MaSV'] ?>" class="btn btn-success btn-sm">Xem</a>
                        <a href="index.php?controller=sinhvien&action=edit&id=<?= $sv['MaSV'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="index.php?controller=sinhvien&action=delete&id=<?= $sv['MaSV'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../shares/footer.php'; ?>
