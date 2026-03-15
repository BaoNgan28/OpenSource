<?php include 'app/views/shares/header.php'; ?>

<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-7">
        <div class="card border-0 shadow-lg rounded-5 overflow-hidden">
            <div class="row g-0">
                <div class="col-lg-5 d-none d-lg-block" style="background: linear-gradient(135deg, #0d6efd 0%, #003366 100%);">
                    <div class="h-100 d-flex flex-column justify-content-center align-items-center text-white p-4 text-center">
                        <i class="bi bi-person-plus" style="font-size: 5rem;"></i>
                        <h3 class="mt-4 fw-bold">Gia nhập cộng đồng!</h3>
                        <p class="small opacity-75">Nhận ngay ưu đãi độc quyền dành riêng cho thành viên.</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card-body p-5">
                        <h2 class="fw-bold mb-4">Đăng ký tài khoản</h2>
                        
                        <?php if (isset($errors)): ?>
                            <div class="alert alert-danger border-0 rounded-4 mb-4">
                                <ul class="mb-0 small">
                                    <?php foreach ($errors as $err): ?> <li><?php echo $err; ?></li> <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="/webbanhang/account/save" method="post">
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Tên đăng nhập</label>
                                <input type="text" name="username" class="form-control rounded-3 border-light bg-light py-2" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Họ và tên</label>
                                <input type="text" name="fullname" class="form-control rounded-3 border-light bg-light py-2" required>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control rounded-3 border-light bg-light py-2" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold">Xác nhận</label>
                                    <input type="password" name="confirmpassword" class="form-control rounded-3 border-light bg-light py-2" required>
                                </div>
                            </div>
                            
                            <button class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm mb-3">TẠO TÀI KHOẢN</button>
                            <p class="text-center small text-muted mb-0">Đã có tài khoản? <a href="/webbanhang/account/login" class="fw-bold text-decoration-none">Đăng nhập</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>