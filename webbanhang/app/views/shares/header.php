<?php
// THÊM: Nạp SessionHelper
require_once 'app/helpers/SessionHelper.php';
SessionHelper::start();

// Khởi tạo dữ liệu cho Navbar phụ (GIỮ NGUYÊN)
require_once 'app/config/database.php';
require_once 'app/models/CategoryModel.php';

$db_nav = (new Database())->getConnection();
$categoryModel_nav = new CategoryModel($db_nav);
$nav_categories = $categoryModel_nav->getCategories();

$cart_count = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cart_count += $item['quantity'];
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Store - 2026</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* TẤT CẢ CSS CŨ CỦA BẠN GIỮ NGUYÊN */
        body { display: flex; flex-direction: column; min-height: 100vh; margin: 0; font-family: 'Inter', sans-serif; background-color: #f4f7f6; }
        .main-content { flex: 1 0 auto; padding-top: 30px; padding-bottom: 60px; }
        .main-navbar { background: #fff; padding: 1rem 0; border-bottom: 1px solid #eee; }
        .sub-navbar { background-color: #003366 !important; padding: 10px 0; }
        .nav-category { color: #fff !important; text-decoration: none; font-size: 0.85rem; font-weight: 600; display: flex; align-items: center; gap: 8px; white-space: nowrap; }
        .nav-category-container { display: flex; justify-content: space-between; align-items: center; }
        .product-card { transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); border: none !important; background: #fff; position: relative; z-index: 1; }
        .product-card:hover { transform: translateY(-12px); box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12) !important; z-index: 2; }
        .img-container { overflow: hidden; border-top-left-radius: 24px; border-top-right-radius: 24px; }
        .product-img { transition: transform 0.6s ease; object-fit: cover; }
        .product-card:hover .product-img { transform: scale(1.15); }
        .btn-add-cart { transition: all 0.3s ease; transform: translateY(10px); opacity: 0.8; }
        .product-card:hover .btn-add-cart { transform: translateY(0); opacity: 1; background: linear-gradient(135deg, #0d6efd 0%, #003366 100%); }

        /* THÊM MỘT CHÚT CHO USER DROPDOWN */
        .user-link { text-decoration: none; font-weight: 600; color: #333; }
        .dropdown-menu { border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg main-navbar sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="/webbanhang/Product/index">
                <i class="bi bi-shop-window me-2"></i> MY STORE
            </a>
            
            <div class="d-flex align-items-center gap-3 ms-auto">
                <a href="/webbanhang/Product/cart" class="btn btn-light rounded-pill position-relative px-3">
                        <i class="bi bi-bag-heart fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary border border-white">
                            <?php echo $cart_count; ?>
                        </span>
                    </a>

                <?php if (SessionHelper::isAdmin()): ?>
                    <a href="/webbanhang/Category/index" class="nav-link px-2 fw-semibold text-dark">Danh mục</a>
                    <a href="/webbanhang/Product/add" class="btn btn-primary rounded-pill px-4 shadow-sm">Thêm sản phẩm</a>
                <?php endif; ?>

                <?php if (SessionHelper::isLoggedIn()): ?>
                    <div class="dropdown">
                        <a href="#" class="user-link dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                <?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?>
                            </div>
                            <span><?php echo $_SESSION['username']; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2">
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item py-2 text-danger" href="/webbanhang/account/logout"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="/webbanhang/account/login" class="btn btn-outline-primary rounded-pill px-4">Đăng nhập</a>
                    <a href="/webbanhang/account/register" class="btn btn-primary rounded-pill px-4">Đăng ký</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <nav class="sub-navbar shadow-sm">
        <div class="container">
            <div class="nav-category-container">
                <a href="/webbanhang/Product/index#store-section" class="nav-category">
                    <i class="bi bi-house-door-fill"></i> TẤT CẢ
                </a>
                <?php if (!empty($nav_categories)): ?>
                    <?php foreach ($nav_categories as $cat): ?>
                        <a href="/webbanhang/Product/index?category_id=<?php echo $cat->id; ?>#store-section"
                            class="nav-category text-uppercase">
                            <i class="bi bi-tag"></i> <?php echo htmlspecialchars($cat->name); ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container main-content">