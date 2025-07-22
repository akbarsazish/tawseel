<?= $this->extend('other') ?>
<?= $this->section('content') ?>

<div class="container">
<div class="row">
<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success">
    <?= esc(session()->getFlashdata('success')) ?>
</div>
<?php endif; ?> 

<?php if (session()->getFlashdata('errors')): ?>
<div class="alert alert-danger">
<ul>
        <li><?= session()->getFlashdata('errors') ?></li>
</ul>
</div>
<?php endif; ?>

<div class="col-6 mx-auto w3-card">
        <div class="w3-xlarge w3-center mylbg"><?=lang('app.change_password')?></div>
        <form id="myForm" class="w3-form w3-container" action="<?=base_url('change/password')?>" method="POST">
            <?= csrf_field() ?>
            <div class="w3-section w3-row-padding"> 
                <div class="form-group">
                    <label class="control-label"><?= lang('app.password') ?></label>
                    <input name="password" type="password" required="required" class="form-control" placeholder="<?= lang('app.password_title') ?>"/>
                </div>
                <div class="form-group">
                    <label class="control-label"><?= lang('app.password') ?></label>
                    <input name="rpassword" type="password" required="required" class="form-control" placeholder="<?= lang('app.password_title') ?>"/>
                </div>                
                <button type="submit" class="btn mybbg"> <?=lang('app.submit')?></button>
            </div>
        </form>
    </div>
    </div>
    </div>
<?= $this->endSection() ?>