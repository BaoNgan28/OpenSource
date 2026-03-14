<?php include 'app/views/shares/header.php'; ?>

<div class="row mb-4 align-items-center">
    <div class="col-md-6">
        <h1 class="fw-bold text-dark">Quản lý Danh mục</h1>
        <p class="text-muted">Phân loại các loại đồ uống trong cửa hàng của bạn.</p>
    </div>
    <div class="col-md-6 text-md-end">
        <a href="/webbanhang/Category/add" class="btn btn-success shadow-sm rounded-pill px-4">
            <i class="bi bi-folder-plus me-2"></i>Thêm danh mục mới
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4" style="width: 80px;">ID</th>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th class="text-center" style="width: 150px;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td class="ps-4 fw-bold text-muted">#<?php echo $category->id; ?></td>
                            <td>
                                <span class="fw-semibold text-primary"><?php echo htmlspecialchars($category->name); ?></span>
                            </td>
                            <td class="text-muted small">
                                <?php echo htmlspecialchars($category->description); ?>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="/webbanhang/Category/edit/<?php echo $category->id; ?>" 
                                       class="btn btn-sm btn-outline-warning border-0 rounded-circle me-1" title="Sửa">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="/webbanhang/Category/delete/<?php echo $category->id; ?>" 
                                       class="btn btn-sm btn-outline-danger border-0 rounded-circle" 
                                       onclick="return confirm('Xóa danh mục này có thể ảnh hưởng đến các sản phẩm thuộc danh mục. Bạn chắc chắn chứ?');" title="Xóa">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>