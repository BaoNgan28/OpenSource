<?php
// Khởi tạo dữ liệu cho Navbar phụ
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
        /* CẤU TRÚC STICKY FOOTER */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Cao tối thiểu 100% màn hình */
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
        }

        /* Phần nội dung chính tự giãn để đẩy footer xuống */
        .main-content {
            flex: 1 0 auto;
            padding-top: 30px;
            padding-bottom: 60px;
        }

        /* Navbar Styles */
        .main-navbar {
            background: #fff;
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
        }

        .sub-navbar {
            background-color: #003366 !important;
            padding: 10px 0;
        }

        .nav-category {
            color: #fff !important;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .nav-category-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Hiệu ứng tổng thể cho thẻ sản phẩm */
        .product-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            /* Chuyển động đàn hồi chuyên nghiệp */
            border: none !important;
            background: #fff;
            position: relative;
            z-index: 1;
        }

        /* Khi di chuột vào: Thẻ nổi lên và đổ bóng sâu hơn */
        .product-card:hover {
            transform: translateY(-12px);
            /* Thẻ bay lên cao hơn */
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12) !important;
            z-index: 2;
        }

        /* Hiệu ứng phóng to ảnh (Zoom) */
        .img-container {
            overflow: hidden;
            /* Cắt phần ảnh thừa khi phóng to */
            border-top-left-radius: 24px;
            border-top-right-radius: 24px;
        }

        .product-img {
            transition: transform 0.6s ease;
            object-fit: cover;
        }

        .product-card:hover .product-img {
            transform: scale(1.15);
            /* Ảnh phóng to nhẹ 15% */
        }

        /* Hiệu ứng nút bấm "Thêm vào giỏ" hiện lên mượt mà */
        .btn-add-cart {
            transition: all 0.3s ease;
            transform: translateY(10px);
            opacity: 0.8;
        }

        .product-card:hover .btn-add-cart {
            transform: translateY(0);
            opacity: 1;
            background: linear-gradient(135deg, #0d6efd 0%, #003366 100%);
            /* Đổi màu gradient khi hover */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg main-navbar sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="/webbanhang/Product/index">
                <i class="bi bi-shop-window me-2"></i> MY STORE
            </a>
            <div class="d-flex align-items-center gap-3 ms-auto">
                <a href="/webbanhang/Product/cart" class="btn btn-light rounded-pill position-relative">
                    <i class="bi bi-cart3"></i> Giỏ hàng
                    <span class="badge rounded-pill bg-danger"><?php echo $cart_count; ?></span>
                </a>
                <a href="/webbanhang/Category/index" class="nav-link px-2">Danh mục</a>
                <a href="/webbanhang/Product/add" class="btn btn-primary rounded-pill px-4">Thêm sản phẩm</a>
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