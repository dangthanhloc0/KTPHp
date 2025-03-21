<?php include __DIR__ . '/../shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="text-center text-primary">Danh sách học phần</h2>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Mã học phần</th>
                <th>Tên Học Phần</th>
                <th>Số Tín Chỉ</th>
                <th>Số lượng</th>
                <th class="text-center">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hocphans as $hp): ?>
                <tr>
                    <td><?= htmlspecialchars($hp['MaHP']) ?></td>
                    <td><?= htmlspecialchars($hp['TenHP']) ?></td>
                    <td class="text-center"><?= htmlspecialchars($hp['SoTinChi']) ?></td>
                    <td class="text-center"><?= htmlspecialchars($hp['soluong']) ?></td>
                    <td class="text-center">
                        <a href="index.php?controller=hocphan&action=register&id=<?= htmlspecialchars($hp['MaHP']) ?>" 
                           class="btn btn-success btn-sm">
                            Đăng ký
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-center mt-3">
        <a href="index.php?controller=hocphan&action=view_cart" class="btn btn-primary">
            Xem học phần đã đăng ký
        </a>
    </div>
</div>

<?php include __DIR__ . '/../shares/footer.php'; ?>
