<?php include __DIR__ . '/../shares/header.php'; ?>

<div class="container d-flex justify-content-center mt-5">
    <div class="card p-4 shadow-lg" style="width: 400px;">
        <h3 class="text-center text-primary">Đăng nhập</h3>

        <form method="POST" action="index.php?controller=sinhvien&action=login">
            <div class="form-group">
                <label for="mssv"><i class="fas fa-user"></i> Mã số sinh viên:</label>
                <input type="text" id="mssv" name="mssv" class="form-control" required placeholder="Nhập MSSV">
            </div>

            <button type="submit" class="btn btn-primary btn-block mt-3">
                <i class="fas fa-sign-in-alt"></i> Đăng nhập
            </button>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../shares/footer.php'; ?>
