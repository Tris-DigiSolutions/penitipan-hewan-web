<div class="form-container sign-in-container">
    <form class="user" action="<?= base_url('auth/login'); ?>" method="post">
        <h1>Sign in</h1>
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        <input type="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" />
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        <input type="password" name="password" placeholder="Password" />
        <a href="#">Forgot your password?</a>
        <button type="submit">Sign In</button>
    </form>
</div>
<div class="overlay-container">
    <div class="overlay">
        <div class="overlay-panel overlay-right">
            <h1>Selamat Datang di PETSHOP!</h1>
            <p>Buat akun untuk mendapatkan informasi lebih lanjut tentang PETSHOP kami untuk kemudahan dalam memberikan layanan penitipan hewan</p>
            <a href="<?= base_url('auth/registration'); ?>">Sign Up</a>
        </div>
    </div>
</div>