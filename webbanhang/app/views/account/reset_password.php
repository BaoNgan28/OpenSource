<?php include 'app/views/shares/header.php'; ?>

<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card border-0 shadow-lg rounded-5 overflow-hidden bg-white">
            <div class="card-body p-5 text-center">
                <h3 class="fw-bold mb-2 text-primary">Đặt lại mật khẩu</h3>
                <p class="text-muted small mb-4">Tài khoản: <strong><?php echo $_SESSION['reset_user']; ?></strong></p>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger border-0 rounded-4 small py-2 mb-4"><?php echo $error; ?></div>
                <?php endif; ?>

                <form action="/webbanhang/account/updatePassword" method="post" class="text-start">
                    <div class="mb-3">
                        <label class="form-label small fw-bold ps-2">Mật khẩu mới</label>
                        <input type="password" name="password" class="form-control border-0 bg-light rounded-4 py-3 px-4" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold ps-2">Xác nhận mật khẩu</label>
                        <input type="password" name="confirmpassword" class="form-control border-0 bg-light rounded-4 py-3 px-4" required>
                    </div>
                    
                    <button class="btn btn-success w-100 py-3 rounded-4 fw-bold shadow-sm" type="submit">CẬP NHẬT MẬT KHẨU</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>