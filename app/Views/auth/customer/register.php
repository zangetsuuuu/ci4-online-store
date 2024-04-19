<?= $this->extend('layout/customers/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen flex items-center justify-center">
    <div class="container px-4 py-16 md:py-0 md:px-0">
        <div class="bg-white p-6 md:p-8 rounded-xl shadow-xl max-w-3xl w-full mx-auto">
            <div class="flex justify-center mb-6">
                <span class="inline-block bg-gray-100 rounded-full p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-5 h-5 stroke-myBlack" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="8.5" cy="7" r="4" />
                        <line x1="20" y1="8" x2="20" y2="14" />
                        <line x1="23" y1="11" x2="17" y2="11" />
                    </svg>
                </span>
            </div>
            <h2 class="text-2xl font-semibold text-center tracking-wide mb-2">Daftar akun baru</h2>
            <p class="text-sm text-gray-500 text-center tracking-wide mb-8">Isi data Anda untuk mendaftar.</p>
            <form class="space-y-5" action="<?= base_url('auth/register'); ?>" method="post">
                <?= csrf_field() ?>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-0 gap-y-4 md:gap-x-4">
                    <div>
                        <label for="first_name" class="text-sm font-medium text-myBlack tracking-wide">Nama Depan <span class="text-red-500">*</span></label>
                        <input type="text" name="first_name" id="first_name" class="<?= ($validation && $validation->hasError('first_name')) ? 'input-error' : 'input-customers' ?>" <?= ($validation && $validation->hasError('first_name')) ? 'autofocus' : '' ?> placeholder="John" value="<?= old('first_name') ?>" />
                        <?php if ($validation && $validation->hasError('first_name')) : ?>
                            <div class="input-error-message">
                                <?= $validation->getError('first_name'); ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div>
                        <label for="last_name" class="text-sm font-medium text-myBlack tracking-wide">Nama Belakang <span class="text-red-500">*</span></label>
                        <input type="text" name="last_name" id="last_name" class="<?= ($validation && $validation->hasError('last_name')) ? 'input-error' : 'input-customers' ?>" <?= ($validation && $validation->hasError('last_name')) ? 'autofocus' : '' ?> placeholder="Doe" value="<?= old('last_name') ?>" />
                        <?php if ($validation && $validation->hasError('last_name')) : ?>
                            <div class="input-error-message">
                                <?= $validation->getError('last_name'); ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div>
                        <label for="username" class="text-sm font-medium text-myBlack tracking-wide">Username <span class="text-red-500">*</span></label>
                        <input type="text" name="username" id="username" class="<?= ($validation && $validation->hasError('username')) ? 'input-error' : 'input-customers' ?>" <?= ($validation && $validation->hasError('username')) ? 'autofocus' : '' ?> placeholder="johndoe" value="<?= old('username') ?>" />
                        <?php if ($validation && $validation->hasError('username')) : ?>
                            <div class="input-error-message">
                                <?= $validation->getError('username'); ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-0 gap-y-4 md:gap-x-4">
                    <div class="col-span-2">
                        <label for="email" class="text-sm font-medium text-myBlack tracking-wide">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" class="<?= ($validation && $validation->hasError('email')) ? 'input-error' : 'input-customers' ?>" <?= ($validation && $validation->hasError('email')) ? 'autofocus' : '' ?> placeholder="someone@example.com" value="<?= old('email') ?>" />
                        <?php if ($validation && $validation->hasError('email')) : ?>
                            <div class="input-error-message">
                                <?= $validation->getError('email'); ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div>
                        <label for="phone_number" class="text-sm font-medium text-myBlack tracking-wide">No. HP <span class="text-red-500">*</span></label>
                        <input type="text" name="phone_number" id="phone_number" class="<?= ($validation && $validation->hasError('phone_number')) ? 'input-error' : 'input-customers' ?>" <?= ($validation && $validation->hasError('phone_number')) ? 'autofocus' : '' ?> placeholder="+62" value="<?= old('phone_number') ?>" />
                        <?php if ($validation && $validation->hasError('phone_number')) : ?>
                            <div class="input-error-message">
                                <?= $validation->getError('phone_number'); ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div>
                    <label for="address" class="text-sm font-medium text-myBlack tracking-wide">Alamat <span class="text-red-500">*</span></label>
                    <input type="text" name="address" id="address" class="<?= ($validation && $validation->hasError('address')) ? 'input-error' : 'input-customers' ?>" <?= ($validation && $validation->hasError('address')) ? 'autofocus' : '' ?> placeholder="Jl. Teratai No. 123" value="<?= old('address') ?>" />
                    <?php if ($validation && $validation->hasError('address')) : ?>
                        <div class="input-error-message">
                            <?= $validation->getError('address'); ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-0 gap-y-4 md:gap-x-4">
                    <div>
                        <label for="password" class="text-sm font-medium text-myBlack tracking-wide">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password" id="password" class="<?= ($validation && $validation->hasError('password')) ? 'input-error' : 'input-customers' ?>" <?= ($validation && $validation->hasError('password')) ? 'autofocus' : '' ?> placeholder="••••••••" value="<?= old('password') ?>" />
                        <?php if ($validation && $validation->hasError('password')) : ?>
                            <div class="input-error-message">
                                <?= $validation->getError('password'); ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div>
                        <label for="confirm_password" class="text-sm font-medium text-myBlack tracking-wide">Konfirmasi Password <span class="text-red-500">*</span></label>
                        <input type="password" name="confirm_password" id="confirm_password" class="<?= ($validation && $validation->hasError('confirm_password')) ? 'input-error' : 'input-customers' ?>" <?= ($validation && $validation->hasError('confirm_password')) ? 'autofocus' : '' ?> placeholder="••••••••" value="<?= old('confirm_password') ?>" />
                        <?php if ($validation && $validation->hasError('confirm_password')) : ?>
                            <div class="input-error-message">
                                <?= $validation->getError('confirm_password'); ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="flex flex-wrap md:flex-nowrap items-center justify-between">
                    <button type="submit" class="btn-primary w-full md:w-auto">Daftar akun</button>
                    <div class="text-sm font-medium text-gray-500 tracking-wide mx-auto md:me-0 mt-4 md:mt-0">
                        Sudah punya akun? <a href="<?= base_url('login'); ?>" class="text-blue-700 hover:underline">Login</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>