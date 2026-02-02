<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f0f2f5; }
        .search-box { background: #fff; padding: 20px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .product-card { border-radius: 15px; overflow: hidden; }
        .table-action-btn { transition: all 0.2s; }
        .table-action-btn:hover { transform: scale(1.1); }
        .empty-state { padding: 40px; background: white; border-radius: 10px; }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark"><i class="fas fa-boxes text-primary me-2"></i>Kho Hàng</h2>
            <a href="/project1/Product/add" class="btn btn-success shadow-sm">
                <i class="fas fa-plus-circle me-1"></i> Thêm sản phẩm mới
            </a>
        </div>

        <div class="search-box border shadow-sm p-4 bg-white rounded-3 mb-4">
    <form action="/project1/Product/list" method="GET" class="row g-3">
        <div class="col-md-4">
            <label class="form-label fw-bold">Tìm kiếm</label>
            <input type="text" name="search" class="form-control" placeholder="Tên sản phẩm..." value="<?php echo $_GET['search'] ?? ''; ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Khoảng giá (VND)</label>
            <div class="input-group">
                <input type="number" name="min_price" class="form-control" placeholder="Từ" value="<?php echo $_GET['min_price'] ?? ''; ?>">
                <input type="number" name="max_price" class="form-control" placeholder="Đến" value="<?php echo $_GET['max_price'] ?? ''; ?>">
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label fw-bold">Sắp xếp theo</label>
            <select name="sort" class="form-select">
                <option value="">Mặc định</option>
                <option value="price_asc" <?php echo ($_GET['sort'] ?? '') == 'price_asc' ? 'selected' : ''; ?>>Giá tăng dần</option>
                <option value="price_desc" <?php echo ($_GET['sort'] ?? '') == 'price_desc' ? 'selected' : ''; ?>>Giá giảm dần</option>
                <option value="name_asc" <?php echo ($_GET['sort'] ?? '') == 'name_asc' ? 'selected' : ''; ?>>Tên A-Z</option>
                <option value="name_desc" <?php echo ($_GET['sort'] ?? '') == 'name_desc' ? 'selected' : ''; ?>>Tên Z-A</option>
            </select>
        </div>

        <div class="col-md-1 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Lọc</button>
        </div>
        
        <?php if (!empty($_GET)): ?>
        <div class="col-12 mt-2">
            <a href="/project1/Product/list" class="text-decoration-none text-danger small">
                <i class="fas fa-times-circle"></i> Xóa tất cả bộ lọc
            </a>
        </div>
        <?php endif; ?>
    </form>
</div>

        <div class="card product-card shadow-sm">
            <div class="card-body p-0">
                <?php if (empty($products)): ?>
                    <div class="empty-state text-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" alt="Empty" style="width: 80px; opacity: 0.5;">
                        <p class="mt-3 text-muted">Không tìm thấy sản phẩm nào phù hợp!</p>
                        <a href="/project1/Product/list" class="btn btn-link">Xem tất cả sản phẩm</a>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th class="ps-4" width="8%">ID</th>
                                    <th width="25%">Sản phẩm</th>
                                    <th>Mô tả chi tiết</th>
                                    <th width="15%">Giá bán</th>
                                    <th class="text-center" width="15%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td class="ps-4 fw-bold text-muted">#<?php echo $product->getID(); ?></td>
                                        <td>
                                            <div class="fw-bold text-primary">
                                                <?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-truncate" style="max-width: 300px;">
                                                <?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger-soft text-danger fw-bold fs-6">
                                                <?php echo number_format($product->getPrice(), 0, ',', '.'); ?> đ
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="/project1/Product/edit/<?php echo $product->getID(); ?>" 
                                                   class="btn btn-outline-warning btn-sm table-action-btn" title="Chỉnh sửa">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="/project1/Product/delete/<?php echo $product->getID(); ?>" 
                                                   class="btn btn-outline-danger btn-sm table-action-btn" 
                                                   onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?');" title="Xóa">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="mt-4 text-center text-muted small">
            Tổng cộng: <?php echo count($products); ?> sản phẩm được tìm thấy.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>