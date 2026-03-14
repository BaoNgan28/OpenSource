<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Store - Hệ thống quản lý bán hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
            color: #333;
        }

        .navbar {
            background-color: #ffffff !important;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: #0d6efd !important;
            letter-spacing: -0.5px;
        }

        .nav-link {
            font-weight: 500;
            color: #555 !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #0d6efd !important;
        }

        .btn-add-product {
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: 600;
        }

        .main-content {
            min-height: 80vh;
            padding-top: 40px;
            padding-bottom: 60px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/webbanhang/Product/">
                <i class="bi bi-shop-window me-2"></i>MODERN STORE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/webbanhang/Product/">Cửa hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/webbanhang/Category/">Danh mục</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a href="/webbanhang/Product/add" class="btn btn-primary btn-add-product shadow-sm">
                            <i class="bi bi-plus-circle me-2"></i>Thêm sản phẩm
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container main-content">