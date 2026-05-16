<div>
    <h2 class="text-center mb-4">Login</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if(isset($_SESSION['error'])) : ?>

                <div class="alert alert-danger">
                    <?= $_SESSION['error']; ?>
                </div>

                <?php unset($_SESSION['error']); ?>

            <?php endif; ?>
            <form action="<?php echo base_url('/user/login'); ?>" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address *</label>
                    <input name="email" type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password *</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <p class="mt-3 text-center">
                Don't have an account? <a href="<?php echo base_url('/user/register'); ?>">Register here</a>.
            </p>
        </div>
    </div>
</div>