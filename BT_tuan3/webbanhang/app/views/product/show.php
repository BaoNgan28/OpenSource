<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/webbanhang/Product/list" class="text-decoration-none">Cửa hàng</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($product->name); ?></li>
        </ol>
    </nav>

    <div class="row g-5">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <?php if (!empty($product->image)): ?>
                    <img src="/webbanhang/<?php echo $product->image; ?>"
                        class="img-fluid w-100 object-fit-cover"
                        style="min-height: 400px;" alt="...">
                <?php else: ?>
                    <img src="https://via.placeholder.com/600x600?text=Beverage+Image"
                        class="img-fluid w-100 object-fit-cover" alt="...">
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="ps-md-4">
                <span class="badge rounded-pill bg-primary px-3 mb-3 shadow-sm">
                    <?php echo htmlspecialchars($product->category_name ?? 'Chưa phân loại'); ?>
                </span>

                <h1 class="display-5 fw-bold text-dark mb-3"><?php echo htmlspecialchars($product->name); ?></h1>

                <h2 class="text-danger fw-bold mb-4">
                    <?php echo number_format($product->price, 0, ',', '.'); ?> <small>VNĐ</small>
                </h2>

                <div class="mb-4">
                    <h5 class="fw-bold border-bottom pb-2">Mô tả sản phẩm</h5>
                    <p class="text-muted lh-lg">
                        <?php echo nl2br(htmlspecialchars($product->description)); ?>
                    </p>
                </div>

                <div class="d-grid gap-2 d-md-flex mt-5">
                    <div class="btn-group">
                        <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-outline-warning btn-lg rounded-pill px-4 ms-md-2">
                            <i class="bi bi-pencil-square me-2"></i>Sửa
                        </a>
                        <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>"
                            class="btn btn-outline-danger btn-lg rounded-pill px-4 ms-2"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa món này?');">
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="/webbanhang/Product" class="text-decoration-none text-muted">
                        <i class="bi bi-arrow-left me-1"></i> Quay lại danh sách sản phẩm
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>