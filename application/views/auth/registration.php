<div class="form-container sign-up-container">
    <form class="user" action="<?= base_url('auth/register'); ?>" method="post">
        <h1>Create Account</h1>
        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
        <input type="text" name="name" placeholder="Name" value="<?= set_value('name'); ?>" />
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        <input type="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" />
        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
        <input type="password" name="password1" placeholder="Password" />
        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
        <input type="password" name="password2" placeholder="Repeat Password" />
        <button type="submit">Sign Up</button>
    </form>
</div>
<div class="overlay-container">
    <div class="overlay">
        <div class="overlay-panel overlay-left">
            <h1>Welcome Back Petshopers!</h1>
            <p>To keep connected with us please login with your personal info</p>
            <a href="<?= base_url('auth/login'); ?>">Sign In</a>
        </div>
    </div>
</div>