<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KTPhp</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Đổi màu nền và font */
        .navbar {
            background-color: #007bff !important; /* Màu xanh đậm */
        }
        .navbar-brand, .nav-link {
            color: white !important; /* Chữ màu trắng */
        }
        .nav-link:hover {
            color: #f8f9fa !important; /* Màu sáng hơn khi hover */
        }

        /* Badge hiển thị số lượng đăng ký */
        .badge-danger {
            background-color: #ff4d4d !important; /* Màu đỏ nhạt hơn */
            font-size: 12px;
            border-radius: 50%;
            padding: 5px 8px;
            position: relative;
            top: -2px;
            left: 3px;
        }

        /* Dropdown menu */
        .dropdown-menu {
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        .dropdown-item:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Thanh điều hướng -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">KTPhp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/app/index.php?controller=sinhvien&action=list">Sinh viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/app/index.php?controller=hocphan&action=list">Học phần</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/app/index.php?controller=hocphan&action=view_cart">
                        Đăng ký 
                        <?php if (!empty($_SESSION['dang_ky'])): ?>
                            <span class="badge badge-danger"><?= count($_SESSION['dang_ky']) ?></span> <!-- Hiển thị số lượng học phần -->
                        <?php endif; ?>
                    </a>
                </li>

                <?php if (isset($_SESSION['sinhvien'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <?= htmlspecialchars($_SESSION['sinhvien']['HoTen']) ?> <!-- Hiển thị tên sinh viên -->
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/app/index.php?controller=sinhvien&action=logout">Đăng xuất</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/app/index.php?controller=sinhvien&action=login">Đăng nhập</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <!-- Bootstrap JS (nếu cần) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
