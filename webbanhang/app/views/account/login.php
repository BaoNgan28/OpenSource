<?php include 'app/views/shares/header.php'; ?>

<style>
    /* Tùy chỉnh thêm để bo góc "cực đại" và mượt mà hơn */
    .auth-card {
        border-radius: 2.5rem !important; /* Bo góc cực đại cho Card */
        border: none;
    }
    
    .auth-input {
        border-radius: 1.2rem !important; /* Bo góc cho ô nhập liệu */
        padding-left: 1.5rem !important;
        background-color: #f8f9fa !important;
        border: 1px solid #f1f1f1 !important;
    }

    .auth-input:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25 margin-bottom: rgba(13, 110, 253, 0.1) !important;
        border-color: #0d6efd !important;
    }

    .btn-rounded {
        border-radius: 1.2rem !important; /* Bo góc cho nút bấm */
        padding: 0.8rem !important;
        letter-spacing: 1px;
    }

    /* Hiệu ứng trôi nổi nhẹ cho Card */
    .hover-float {
        transition: transform 0.3s ease;
    }
    .hover-float:hover {
        transform: translateY(-5px);
    }
</style>

<div class="row justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="col-11 col-sm-8 col-md-6 col-lg-4">
        <div class="card auth-card shadow-lg hover-float">
            <div class="card-body p-4 p-sm-5">
                
                <div class="text-center mb-5">
                    <div class="bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; border-radius: 1.2rem;">
                        <i class="bi bi-person-circle fs-1 text-primary"></i>
                    </div>
                    <h2 class="fw-bold text-dark">Xin chào!</h2>
                    <p class="text-muted small">Đăng nhập để khám phá thế giới mua sắm</p>
                </div>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger border-0 rounded-4 small py-2 text-center mb-4">
                        <i class="bi bi-exclamation-circle me-2"></i><?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <form action="/webbanhang/account/checklogin" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control auth-input" id="userInput" placeholder="Tên đăng nhập" required>
                        <label for="userInput" class="ps-4 text-muted">Tên đăng nhập</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control auth-input" id="passInput" placeholder="Mật khẩu" required>
                        <label for="passInput" class="ps-4 text-muted">Mật khẩu</label>
                        <a class="small text-decoration-none" href="/webbanhang/account/forgotPassword">Quên mật khẩu?</a>
                    </div>
                    
                    <button class="btn btn-primary w-100 btn-rounded fw-bold shadow-sm mb-4" type="submit">
                        ĐĂNG NHẬP <i class="bi bi-arrow-right-short ms-1"></i>
                    </button>
                    
                    <div class="text-center">
                        <p class="mb-0 small text-muted">Chưa có tài khoản? 
                            <a href="/webbanhang/account/register" class="text-primary fw-bold text-decoration-none">Đăng ký ngay</a>
                        </p>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>