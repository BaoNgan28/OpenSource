<?php include 'app/views/shares/header.php'; ?>

<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card border-0 shadow-lg rounded-5 overflow-hidden">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; border-radius: 1.2rem;">
                        <i class="bi bi-shield-lock fs-1"></i>
                    </div>
                    <h3 class="fw-bold">Quên mật khẩu?</h3>
                    <p class="text-muted small">Nhập thông tin để xác minh danh tính</p>
                </div>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger border-0 rounded-4 small py-2 text-center mb-4"><?php echo $error; ?></div>
                <?php endif; ?>

                <form action="/webbanhang/account/verifyAccount" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control border-0 bg-light rounded-4" placeholder="Username" required>
                        <label class="ps-4 text-muted">Tên đăng nhập</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" name="fullname" class="form-control border-0 bg-light rounded-4" placeholder="Full name" required>
                        <label class="ps-4 text-muted">Họ và tên chính xác</label>
                    </div>
                    
                    <button class="btn btn-primary w-100 py-3 rounded-4 fw-bold shadow-sm mb-3" type="submit">XÁC MINH</button>
                    <a href="/webbanhang/account/login" class="btn btn-light w-100 py-2 rounded-4 small text-muted">Quay lại đăng nhập</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>