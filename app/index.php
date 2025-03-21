<?php
require_once __DIR__ . '/controllers/HocPhanController.php';
require_once __DIR__ . '/controllers/SinhVienController.php';
session_start();

// Kiểm tra tham số "controller" và "action"
$controller = $_GET['controller'] ?? 'hocphan';  // Mặc định là "hocphan"
$action = $_GET['action'] ?? 'list';  // Mặc định là "list"

switch ($controller) {
    case 'hocphan':
        $hocPhanController = new HocPhanController();
        switch ($action) {
            case 'list':
                $hocPhanController->index();
                break;
            case 'register':
                 $hocPhanController->register();
                break;
            case 'view_cart':
                $hocPhanController->viewCart();
                break;
            case 'remove':
                $hocPhanController->remove();
                break;
            case 'clearAll':
                $hocPhanController->clearAll();
                break;
            case 'save':
                $hocPhanController->save();
                break;
          
            default:
                echo "Hành động không hợp lệ!";
        }
        break;

    case 'sinhvien':
        $sinhVienController = new SinhVienController();
        switch ($action) {
            case 'list':
                $sinhVienController->index();
                break;
            case 'detail':
                $sinhVienController->detail();
                break;
            case 'add':
                $sinhVienController->add();
                break;
            case 'edit':
                $sinhVienController->edit();
                break;
            case 'delete':
                $sinhVienController->delete();
                break;
            case 'login':
                    $sinhVienController->login();
                    break;
             case 'logout':
                        $sinhVienController->logout();
                        break;
            default:
                echo "Hành động không hợp lệ!";
        }
        break;

    default:
        echo "Controller không hợp lệ!";
}
?>
