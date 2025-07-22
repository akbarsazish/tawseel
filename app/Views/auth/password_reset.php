<?= $this->extend('dashboard') ?>
<?= $this->section('title') ?>
    <?= lang('app.title') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

        <div class="card">
            <div class="card-header">
                <h4><?=lang('app.edit_user')?></h4>
            </div>
            <div class="card-body">
            <form id="myForm" class="" action="<?=base_url('password/'.$id)?>" method="POST">
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
                <button type="submit" class="w3-button w3-blue w3-small w3-card"> <?=lang('app.submit')?></button>
            </div>
        </form>
            </div>
        </div>

<?= $this->endSection() ?>