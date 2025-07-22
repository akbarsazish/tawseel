<?= $this->extend('other') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto w3-card w3-white">
            <div class="w3-xlarge w3-center mylbg"><?=lang('app.signup')?></div>
            <form id="myForm" action="<?= base_url('signup/'.$type.'/'.$sub_type) ?>" method="POST" class="w3-form w3-container">
                <?= csrf_field() ?>
            <div class="w3-section w3-row-padding"> 
                <div class="form-group">
                    <label for="fullname" class="form-label"><?= lang('app.fullname') ?></label>
                    <input type="text" class="form-control" id="fullname" name="fullname" required placeholder="<?= lang('app.fullname_title') ?>" value="<?= old('fullname') ?>" >
                    <div class="invalid-feedback">Please provide your full name .</div>
                </div>

                    <div class="form-group" <?php if($type){echo "style='display:none;'";}?>>
                    <label for="type" class="form-label"><?= lang('app.account_type') ?></label>
                    <select name="type" id="type" class="form-control" onchange="if($(this).val() == 'eCommerce') {$('#sub_type_div,#cr_div').show(); $('#sub_type').html('<option value=\'b2b\'><?= lang('app.b2b') ?></option><option value=\'b2c\'><?= lang('app.b2c') ?></option><option value=\'c2c\'><?= lang('app.c2c') ?></option>');}else if($(this).val() == 'personal') {$('#sub_type_div,#cr_div').hide(); $('#sub_type').empty();} else {$('#sub_type_div,#cr_div,#logistics_type_div').show(); $('#sub_type').html('<option value=\'1pl\'><?= lang('app.1pl') ?></option><option value=\'2pl\'><?= lang('app.2pl') ?></option><option value=\'3_4pl\'><?= lang('app.3_4pl') ?></option>');}">
                        <option value="personal" <?= (old('type') ?? $type) == 'personal' ? 'selected' : '' ?>><?= lang('app.personal') ?></option>    
                        <option value="eCommerce" <?= (old('type') ?? $type) == 'eCommerce' ? 'selected' : '' ?>><?= lang('app.eCommerce') ?></option>
                        <option value="logistics" <?= (old('type') ?? $type) == 'logistics' ? 'selected' : '' ?>><?= lang('app.logistics') ?></option>
                    </select>
                    </div>

                    <div class="form-group" id="sub_type_div" <?php if(!$type && old('type')){echo "style='display:block;'";}else{echo "style='display:none;'";}?>>
                    <label for="sub_type" class="form-label"><?= lang('app.sub_type') ?></label>
                    <select name="sub_type" id="sub_type" class="form-control" onchange="if($(this).val() == '1pl'){$('#logistics_type_div').show();}else{$('#logistics_type_div').hide();}">
                        <?php
                        if($type == 'eCommerce' || old('type') == 'eCommerce')
                        {?>
                            <option value='b2b' <?= (old('sub_type') ?? $sub_type) == 'b2b' ? 'selected' : '' ?>><?= lang('app.b2b') ?></option>
                            <option value='b2c' <?= (old('sub_type') ?? $sub_type) == 'b2c' ? 'selected' : '' ?>><?= lang('app.b2c') ?></option>
                            <option value='c2c' <?= (old('sub_type') ?? $sub_type) == 'c2c' ? 'selected' : '' ?>><?= lang('app.c2c') ?></option>
                            
                        <?php
                        }
                        elseif($type == 'logistics' || old('type') == 'logistics')
                        {?>
                            <option value='1pl' <?= (old('sub_type') ?? $sub_type) == '1pl' ? 'selected' : '' ?>><?= lang('app.1pl') ?></option>
                            <option value='2pl' <?= (old('sub_type') ?? $sub_type) == '2pl' ? 'selected' : '' ?>><?= lang('app.2pl') ?></option>
                            <option value='3_4pl' <?= (old('sub_type') ?? $sub_type) == '3_4pl' ? 'selected' : '' ?>><?= lang('app.3_4pl') ?></option>
                        <?php
                        }?>
                    </select>
                    </div>

                    <div class="form-group" id="logistics_type_div" style="<?php if($sub_type == '1pl' || old('sub_type') == '1pl'){echo 'display:block';}else echo 'display:none'?>">
                    <label for="logistics_type" class="form-label"><?= lang('app.logistics_type') ?></label>
                    <select name="logistics_type" id="logistics_type" class="form-control" onchange="if($(this).val() == 'individual'){$('#cr_div').hide();}else{$('#cr_div').show();}">
                        <option value="corporation" <?= (old('logistics_type') == 'corporation') ? 'selected' : ''; ?>><?= lang('app.corporation') ?></option>
                        <option value="individual" <?= (old('logistics_type') == 'individual') ? 'selected' : ''; ?>><?= lang('app.individual') ?></option>
                    </select>
                    </div>

                <div class="form-group" id="cr_div" style="<?php if($type == 'personal' || old('logistics_type') == 'individual'){echo 'display:none';}?>">
                    <label for="cr" class="form-label"><?= lang('app.cr') ?></label>
                    <input type="text" class="form-control" id="cr" name="cr" placeholder="<?= lang('app.cr_title') ?>" value="<?= old('cr') ?>" >
                    <div class="invalid-feedback">Please provide a valid cr.</div>
                </div>    
                <div class="form-group">
                    <label for="email" class="form-label"><?= lang('app.email') ?></label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="<?= lang('app.email_title') ?>" value="<?= old('email') ?>" >
                    <div class="invalid-feedback">Please provide a valid email.</div>
                </div>
                <div class="form-group">
                    <label for="phone" class="form-label"><?= lang('app.phone_name') ?></label>
                    <input type="text" class="form-control" id="phone" name="phone" required placeholder="<?= lang('app.phone_title') ?>" value="<?= old('phone') ?>"  oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8);">
                    <div class="invalid-feedback">Please provide your phone number.</div>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label"><?= lang('app.password') ?></label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="<?= lang('app.password_title') ?>" value="<?= old('password') ?>">
                    <div class="invalid-feedback">Please provide a password.</div>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="form-label"><?= lang('app.cpassword') ?></label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required placeholder="<?= lang('app.rpassword_title') ?>" value="<?= old('confirm_password') ?>">
                    <div class="invalid-feedback">Please confirm your password.</div>
                </div>

                <button type="submit" class="btn mybbg"><?= lang('app.submit') ?></button>
            </form>
        </div>
    </div>
</div>

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