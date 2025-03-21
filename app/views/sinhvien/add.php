<?php include __DIR__ . '/../shares/header.php'; ?>

<div class="container d-flex justify-content-center mt-5">
    <div class="card p-4 shadow-lg" style="width: 500px;">
        <h3 class="text-center text-success">Thêm Sinh Viên</h3>

        <form method="POST" action="index.php?controller=sinhvien&action=add" enctype="multipart/form-data">
            <div class="form-group">
                <label for="MaSV">Mã SV:</label>
                <input type="text" id="MaSV" name="MaSV" class="form-control" required placeholder="Nhập mã sinh viên">
            </div>

            <div class="form-group">
                <label for="HoTen">Họ Tên:</label>
                <input type="text" id="HoTen" name="HoTen" class="form-control" required placeholder="Nhập họ tên">
            </div>

            <div class="form-group">
                <label for="GioiTinh">Giới Tính:</label>
                <select id="GioiTinh" name="GioiTinh" class="form-control">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>

            <div class="form-group">
                <label for="NgaySinh">Ngày Sinh:</label>
                <input type="date" id="NgaySinh" name="NgaySinh" class="form-control">
            </div>

            <div class="form-group">
                <label for="Hinh">Hình ảnh:</label>
                <input type="file" id="Hinh" name="Hinh" class="form-control" accept="image/*">
            </div>

            <div class="form-group">
                <label for="MaNganh">Mã Ngành:</label>
                <input type="text" id="MaNganh" name="MaNganh" class="form-control" placeholder="Nhập mã ngành">
            </div>

            <button type="submit" class="btn btn-success btn-block mt-3">
                <i class="fas fa-plus"></i> Thêm Sinh Viên
            </button>
        </form>

        <a href="index.php?controller=sinhvien&action=list" class="btn btn-secondary btn-block mt-2">
            <i class="fas fa-arrow-left"></i> Quay lại danh sách
        </a>
    </div>
</div>

<?php include __DIR__ . '/../shares/footer.php'; ?>
