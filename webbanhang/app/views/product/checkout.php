<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/webbanhang/Product/cart" class="text-decoration-none text-muted">Giỏ hàng</a></li>
                <li class="breadcrumb-item active fw-bold text-primary" aria-current="page">Thanh toán</li>
            </ol>
        </nav>
        <a href="/webbanhang/Product/cart" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
            <i class="bi bi-arrow-left me-1"></i> Quay lại giỏ hàng
        </a>
    </div>

    <form action="/webbanhang/Product/processCheckout" method="POST">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h4 class="fw-bold mb-4 text-dark"><i class="bi bi-truck me-2 text-primary"></i>Thông tin giao hàng</h4>
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-semibold">Họ và tên người nhận</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 rounded-start-pill"><i class="bi bi-person"></i></span>
                                <input type="text" name="name" class="form-control bg-light border-start-0 rounded-end-pill" placeholder="VD: Nguyễn Văn A" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-semibold">Số điện thoại</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 rounded-start-pill"><i class="bi bi-telephone"></i></span>
                                <input type="tel" name="phone" class="form-control bg-light border-start-0 rounded-end-pill" placeholder="VD: 0912345678" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-semibold">Địa chỉ nhận hàng</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 rounded-start-4"><i class="bi bi-geo-alt"></i></span>
                                <textarea name="address" class="form-control bg-light border-start-0 rounded-end-4" rows="3" placeholder="Số nhà, tên đường, phường/xã, quận/huyện..." required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 p-3 bg-primary-subtle rounded-3 border border-primary-bottom">
                        <p class="small text-primary mb-0">
                            <i class="bi bi-info-circle-fill me-1"></i> Quý khách vui lòng kiểm tra kỹ thông tin trước khi xác nhận đơn hàng.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 p-4 sticky-top" style="top: 20px;">
                    <h4 class="fw-bold mb-4 text-dark">Đơn hàng của bạn</h4>
                    
                    <div class="order-items-list mb-4" style="max-height: 300px; overflow-y: auto;">
                        <?php 
                        $total_price = 0;
                        $cart = $_SESSION['cart'] ?? [];
                        foreach ($cart as $item): 
                            $subtotal = $item['price'] * $item['quantity'];
                            $total_price += $subtotal;
                        ?>
                        <div class="d-flex align-items-center mb-3">
                            <div class="position-relative">
                                <img src="/webbanhang/<?php echo $item['image']; ?>" class="rounded-3 border" style="width: 50px; height: 50px; object-fit: cover;">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary border border-light" style="font-size: 0.7rem;">
                                    <?php echo $item['quantity']; ?>
                                </span>
                            </div>
                            <div class="ms-3 flex-grow-1">
                                <h6 class="mb-0 small fw-bold text-truncate" style="max-width: 180px;"><?php echo htmlspecialchars($item['name']); ?></h6>
                                <span class="text-muted small"><?php echo number_format($item['price'], 0, ',', '.'); ?> đ</span>
                            </div>
                            <div class="text-end">
                                <span class="fw-bold small"><?php echo number_format($subtotal, 0, ',', '.'); ?> đ</span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <hr class="dashed">

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Tạm tính:</span>
                        <span class="fw-semibold"><?php echo number_format($total_price, 0, ',', '.'); ?> đ</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Phí vận chuyển:</span>
                        <span class="text-success fw-bold">Miễn phí</span>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-3 pt-3 border-top">
                        <span class="fs-5 fw-bold">Tổng thanh toán:</span>
                        <span class="fs-4 fw-bold text-danger"><?php echo number_format($total_price, 0, ',', '.'); ?> đ</span>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold mt-4 shadow">
                        <i class="bi bi-shield-check me-2"></i>HOÀN TẤT ĐẶT HÀNG
                    </button>
                    
                    <p class="text-center text-muted small mt-3 mb-0">
                        Bằng việc nhấn đặt hàng, bạn đồng ý với các điều khoản của cửa hàng.
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .input-group-text {
        border-color: transparent;
    }
    .form-control:focus {
        box-shadow: none;
        border-color: #0d6efd;
    }
    hr.dashed {
        border-top: 2px dashed #dee2e6;
        background-color: transparent;
    }
    .order-items-list::-webkit-scrollbar {
        width: 4px;
    }
    .order-items-list::-webkit-scrollbar-thumb {
        background: #ced4da;
        border-radius: 10px;
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>