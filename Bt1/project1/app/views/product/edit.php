<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0 text-center">Chỉnh Sửa Sản Phẩm</h4>
                    </div>
                    <div class="card-body p-4">
                        
                        <form method="POST" action="/project1/Product/edit/<?php echo $product->getID(); ?>">
                            
                            <div class="mb-3">
                                <label class="form-label text-muted">ID Sản phẩm</label>
                                <input type="text" class="form-control" value="<?php echo $product->getID(); ?>" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="<?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label fw-bold">Giá bán</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="price" name="price" step="0.01" 
                                           value="<?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?>" required>
                                    <span class="input-group-text">VND</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Mô tả</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></textarea>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="/project1/Product/list" class="btn btn-secondary me-md-2">Hủy bỏ</a>
                                <button type="submit" class="btn btn-primary px-4">Lưu thay đổi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>