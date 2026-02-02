<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0 text-center">Thêm Sản Phẩm Mới</h4>
                    </div>
                    <div class="card-body p-4">
                        
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Đã có lỗi xảy ra:</strong>
                                <ul class="mb-0 mt-2">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="/project1/Product/add" onsubmit="return validateForm();" novalidate>
                            
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm (10-100 ký tự)" required>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label fw-bold">Giá bán</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="price" name="price" step="0.01" placeholder="Nhập giá bán" required>
                                    <span class="input-group-text">VND</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Mô tả sản phẩm</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả chi tiết..." required></textarea>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="/project1/Product/list" class="btn btn-secondary me-md-2">Quay lại</a>
                                <button type="submit" class="btn btn-success px-4">Thêm sản phẩm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            let name = document.getElementById('name').value;
            let price = document.getElementById('price').value;
            let errors = [];
            
            if (name.length < 10 || name.length > 100) {
                errors.push('Tên sản phẩm phải có từ 10 đến 100 ký tự.');
            }
            if (price <= 0 || isNaN(price)) {
                errors.push('Giá phải là một số dương lớn hơn 0.');
            }
            
            if (errors.length > 0) {
                alert(errors.join('\n'));
                return false;
            }
            return true;
        }
    </script>
</body>
</html>