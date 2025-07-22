<?= $this->extend('other') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12 mx-auto w3-card w3-white">
        <div class="w3-xlarge w3-center mylbg"><?=lang('app.login3')?></div>
            <form id="myForm" action="<?= base_url('login') ?>" method="POST" class="w3-form w3-container">
            <?= csrf_field() ?>
            <div class="form-group">
                    <label for="email" class="form-label"><?= lang('app.email') ?></label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="<?= lang('app.email_title') ?>" value="<?= old('email', $email ?? '') ?>" >
                    <div class="invalid-feedback"><?=lang('app.provide_valid_email')?></div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label"><?= lang('app.password') ?></label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="<?= lang('app.password_title') ?>">
                    <div class="invalid-feedback"><?=lang('app.provide_password')?></div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn mybbg"><?= lang('app.login3') ?></button>
                </div>
                <div class="form-group">
                    <a href="<?=base_url('signup')?>"><?= lang('app.signup') ?></a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Optional: Add client-side validation
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
    })();
</script>
<?= $this->endSection() ?>