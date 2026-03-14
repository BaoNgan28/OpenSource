<?php include 'app/views/shares/header.php'; ?>

<div class="row mb-5">
    <div class="col-12">
        <div class="p-5 text-white rounded-4 shadow-sm" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
            <div class="row align-items-center">
                <div class="col-md-8 text-center text-md-start">
                    <h1 class="display-4 fw-bold">Thức uống tươi mát mỗi ngày</h1>
                    <p class="lead mb-4">Khám phá menu đa dạng từ cà phê truyền thống đến trà trái cây hiện đại.</p>
                    <div class="d-flex gap-2 justify-content-center justify-content-md-start">
                        <a href="#store-section" class="btn btn-light btn-lg px-4 rounded-pill fw-bold text-primary">Sản phẩm</a>
                        <a href="/webbanhang/Product/add" class="btn btn-outline-light btn-lg px-4 rounded-pill">Quản lý kho</a>
                    </div>
                </div>
                <div class="col-md-4 d-none d-md-block text-center">
                    <i class="bi bi-cup-straw" style="font-size: 8rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4 align-items-center" id="store-section">
    <div class="col-md-6 mb-3 mb-md-0">
        <h3 class="fw-bold m-0 text-dark">
            <?php echo isset($_GET['search']) && !empty($_GET['search']) 
                ? 'Kết quả cho: "' . htmlspecialchars($_GET['search']) . '"' 
                : 'Danh mục sản phẩm'; ?>
        </h3>
    </div>
    <div class="col-md-6">
        <form action="/webbanhang/Product#store-section" method="GET" class="search-wrapper">
            <div class="input-group shadow-sm rounded-pill overflow-hidden bg-white border">
                <span class="input-group-text bg-white border-0 ps-4">
                    <i class="bi bi-search text-primary"></i>
                </span>
                <input type="text" name="search" 
                       class="form-control border-0 ps-2 shadow-none" 
                       placeholder="Tìm kiếm đồ uống bạn yêu thích..."
                       value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                <button class="btn btn-primary px-4 fw-bold" type="submit">Tìm kiếm</button>
            </div>
        </form>
    </div>
</div>

<div class="row g-4">
    <?php if (empty($products)): ?>
        <div class="col-12 text-center py-5">
            <div class="bg-white rounded-4 shadow-sm py-5">
                <i class="bi bi-search display-1 text-muted opacity-25"></i>
                <h4 class="mt-4 text-muted">Không tìm thấy sản phẩm nào khớp với từ khóa.</h4>
                <a href="/webbanhang/Product#store-section" class="btn btn-link text-primary mt-2">Xem tất cả sản phẩm</a>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($products as $product): ?>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 product-card overflow-hidden bg-white">
                    <div class="position-relative overflow-hidden" style="height: 220px;">
                        <?php if (!empty($product->image)): ?>
                            <img src="/webbanhang/<?php echo $product->image; ?>" class="card-img-top h-100 w-100 object-fit-cover transition-img" alt="...">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/400x300?text=No+Image" class="card-img-top h-100 w-100 object-fit-cover" alt="...">
                        <?php endif; ?>
                        
                        <span class="position-absolute top-0 start-0 m-3 badge rounded-pill bg-primary shadow-sm px-3">
                            <?php echo htmlspecialchars($product->category_name ?? 'Đồ uống', ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                    </div>

                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-2">
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="text-decoration-none text-dark stretched-link">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h5>
                        <p class="card-text text-muted small mb-4 text-truncate-2">
                            <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                            <span class="fs-5 fw-bold text-danger">
                                <?php echo number_format((float)$product->price, 0, ',', '.'); ?> <small>đ</small>
                            </span>
                            <div class="btn-group position-relative" style="z-index: 2;">
                                <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-sm btn-light shadow-sm rounded-circle me-1 text-warning" title="Sửa">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" 
                                   class="btn btn-sm btn-light shadow-sm rounded-circle text-danger" 
                                   onclick="return confirm('Xóa món này khỏi menu?');" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>