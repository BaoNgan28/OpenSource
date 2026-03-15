<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="card border-0 shadow-sm rounded-4 p-5">
                <div class="success-icon mb-4">
                    <i class="bi bi-bag-check-fill text-success" style="font-size: 5rem;"></i>
                </div>
                <h2 class="fw-bold mb-3">Đặt hàng thành công!</h2>
                <p class="text-muted mb-4 fs-5">
                    Cảm ơn bạn đã ủng hộ cửa hàng. Đơn hàng của bạn đã được hệ thống ghi nhận và sẽ sớm được xử lý.
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="/webbanhang/Product/index" class="btn btn-primary rounded-pill px-4 py-2 fw-bold">
                        <i class="bi bi-house-door me-2"></i>Về trang chủ
                    </a>
                    </div>
            </div>
        </div>
    </div>
</div>

<style>
    .success-icon i {
        display: inline-block;
        animation: heartBeat 1.5s infinite;
    }
    @keyframes heartBeat {
        0% { transform: scale(1); }
        14% { transform: scale(1.1); }
        28% { transform: scale(1); }
        42% { transform: scale(1.1); }
        70% { transform: scale(1); }
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>