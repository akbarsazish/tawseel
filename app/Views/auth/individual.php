<?= $this->extend('other') ?>
<?= $this->section('title') ?>
    <?= lang('app.title') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<head>
  <style>
.stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
</style>
</head>

<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-1" type="button" class="btn btn-success w3-green btn-circle">1</a>
                <p>
                <small><?=lang('app.id')?></small>
                </p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>
                    <small><?=lang('app.driving_license')?></small>
                </p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small><?=lang('app.registration_certificate')?></small></p>
            </div>
             <div class="stepwizard-step col-xs-3"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small><?=lang('app.choose_your_partner')?></small></p>
            </div>
                                           
        </div>
    </div>

<form role="form" action="<?= base_url('business/individual') ?>" method="POST" enctype="multipart/form-data" id="myForm">
<?= csrf_field() ?> 
    <div class="panel panel-primary setup-content" id="step-1" style="display:none;">
        <div class="panel-heading mybbg">
            <h3 class="panel-title"><?= lang('app.id_title') ?></h3>
        </div>
    <div class="panel-body w3-row-padding">
    <div class="form-group w3-half">
        <label class="control-label"><?= lang('app.id_number') ?></label>
        <input name="id_number" maxlength="100" type="text" required="required" class="form-control" placeholder="<?= lang('app.id_number_title') ?>" value="<?= old('id_number') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
    </div>
    <div class="form-group w3-half">
        <label class="control-label"><?= lang('app.expire_date') ?></label>
        <input name="id_expire_date" type="date" required="required" class="form-control" value="<?= old('id_expire_date') ?>" />
    </div>
    <div class="form-group w3-half">
        <label class="control-label"><?= lang('app.first_name') ?></label>
        <input name="id_first_name" maxlength="100" type="text" required="required" class="form-control" placeholder="<?= lang('app.first_name_title') ?>" value="<?= old('id_first_name') ?>" />
    </div>
    <div class="form-group w3-half">
        <label class="control-label"><?= lang('app.second_name') ?></label>
        <input name="id_second_name" maxlength="100" type="text" class="form-control" placeholder="<?= lang('app.second_name_title') ?>" value="<?= old('id_second_name') ?>" />
    </div>
    <div class="form-group w3-half">
        <label class="control-label"><?= lang('app.third_name') ?></label>
        <input name="id_third_name" maxlength="100" type="text" class="form-control" placeholder="<?= lang('app.third_name_title') ?>" value="<?= old('id_third_name') ?>" />
    </div>
    <div class="form-group w3-half">
        <label class="control-label"><?= lang('app.sur_name') ?></label>
        <input name="id_sur_name" maxlength="100" type="text" required="required" class="form-control" placeholder="<?= lang('app.sur_name_title') ?>" value="<?= old('id_sur_name') ?>" />
    </div>
    <div class="form-group w3-half">
        <label class="control-label"><?= lang('app.date_of_birth') ?></label>
        <input name="id_date_of_birth" type="date" required="required" class="form-control" value="<?= old('id_date_of_birth') ?>" />
    </div>
    <div class="form-group w3-half">
        <label class="control-label"><?= lang('app.address_name') ?></label>
        <input name="id_address" maxlength="100" type="text" required="required" class="form-control" placeholder="<?= lang('app.address_title') ?>" value="<?= old('id_address') ?>" />
    </div>
    <div class="form-group w3-half">
        <label class="control-label"><?= lang('app.id_front') ?></label>
        <input name="id_document" type="file" required="required" class="form-control" accept="image/*" />
    </div>    
    <div class="form-group w3-half">
        <label class="control-label"><?= lang('app.id_back') ?></label>
        <input name="id_back" type="file" required="required" class="form-control" accept="image/*" />
    </div>    
    <button class="btn btn-primary nextBtn pull-right" type="button"><?= lang('app.next') ?></button>
</div>
</div>
        
        
<div class="panel panel-primary setup-content" id="step-2" style="display:none;">
    <div class="panel-heading">
        <h3 class="panel-title"><?= lang('app.driving_license') ?></h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="control-label"><?= lang('app.license_number') ?></label>
            <input name="license_number" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.license_number_title') ?>" value="<?= old('license_number') ?>" />
        </div>
        <div class="form-group">
            <label class="control-label"><?= lang('app.issued_at') ?></label>
            <select name="issued_at" id="issued_at" required="required" class="form-control">
                <option disabled>Select a province...</option>
                <?php foreach (lang('app.provinces') as $value => $name): ?>
                <option value="<?php echo $value; ?>"><?php echo $name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label"><?= lang('app.issue_date') ?></label>
            <input name="issue_date" maxlength="200" type="date" required="required" class="form-control" placeholder="<?= lang('app.issue_date') ?>" value="<?= old('issue_date') ?>" />
        </div>
        <div class="form-group">
            <label class="control-label"><?= lang('app.expiry_date') ?></label>
            <input name="expiry_date" maxlength="200" type="date" required="required" class="form-control" placeholder="<?= lang('app.expiry_date') ?>" value="<?= old('expiry_date') ?>" />
        </div>
        <div class="form-group">
            <label class="control-label"><?= lang('app.driving_license_front') ?></label>
            <input name="driving_license" type="file" required="required" class="form-control" accept="image/*" />
        </div>
        <div class="form-group">
            <label class="control-label"><?= lang('app.driving_license_back') ?></label>
            <input name="driving_license_back" type="file" required="required" class="form-control" accept="image/*" />
        </div>

        <button class="btn btn-primary nextBtn pull-right" type="button"><?= lang('app.next') ?></button>
    </div>
</div>
        
<div class="panel panel-primary setup-content" id="step-3" style="display:none;">
    <div class="panel-heading">
        <h3 class="panel-title"><?= lang('app.registration_certificate') ?></h3>
    </div>
    <div class="panel-body w3-row-padding">
        <div class="form-group w3-col">
            <label class="control-label"><?= lang('app.vehicle_owner') ?></label>
            <input name="vehicle_owner" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.vehicle_owner') ?>" value="<?= old('vehicle_owner') ?>" />
        </div>
        <div class="form-group w3-col">
            <label class="control-label"><?= lang('app.plate_number') ?></label>
            <input name="plate_number" maxlength="200" type="number" required="required" class="form-control" placeholder="<?= lang('app.plate_number') ?>" value="<?= old('plate_number') ?>" />
        </div>
        <div class="form-group w3-col">
            <label class="control-label"><?= lang('app.letters_of_plate') ?></label>
            <input name="letters_of_plate" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.letters_of_plate') ?>" value="<?= old('letters_of_plate') ?>" />
        </div>
        <div class="form-group w3-half">
            <label class="control-label"><?= lang('app.issue_date') ?></label>
            <input name="issue_date" type="date" required="required" class="form-control" value="<?= old('issue_date') ?>" />
        </div>
        <div class="form-group w3-half">
            <label class="control-label"><?= lang('app.expiry_date') ?></label>
            <input name="expiry_date" type="date" required="required" class="form-control" value="<?= old('expiry_date') ?>" />
        </div>        
        <div class="form-group w3-half">
            <label class="control-label"><?= lang('app.registration_certificate_front') ?></label>
            <input name="registration_certificate" type="file" required="required" class="form-control" accept="image/*" />
        </div>
        <div class="form-group w3-half">
            <label class="control-label"><?= lang('app.registration_certificate_back') ?></label>
            <input name="registration_certificate_back" type="file" required="required" class="form-control" accept="image/*" />
        </div>

        <button class="btn btn-primary nextBtn pull-right" type="button"><?= lang('app.next') ?></button>
    </div>
</div>

    <div class="panel panel-primary setup-content" id="step-4" style="display:none;">
    <div class="panel-heading">
        <h3 class="panel-title"><?= lang('app.choose_your_partner') ?></h3>
    </div>
    <div class="panel-body w3-row-padding">
        <div class="form-group w3-col">
            <label class="control-label"><?= lang('app.cr_or_name') ?></label>
            <input list="crs" name="parent_id" required="required" class="form-control" placeholder="<?= lang('app.cr_or_name_title') ?>" value="<?= old('pid') ?>" />
            <datalist id="crs">
            <?php foreach ($records as $r): ?>
                <option value="<?= esc($r['id']).'> '.esc($r['cr_number']).': '.esc($r['cr_name_en']) ?>"></option>
            <?php endforeach; ?>
            </datalist>
        </div>
        <button type="submit" class="btn mybbg"><?= lang('app.submit') ?></button>
    </div>

    </form>
</div>
<script>
  $(document).ready(function () {

var navListItems = $('div.setup-panel div a'),
    allWells = $('.setup-content'),
    allNextBtn = $('.nextBtn');

allWells.hide();

navListItems.click(function (e) 
{
    e.preventDefault();
    var $target = $($(this).attr('href')),
        $item = $(this);

    if (!$item.hasClass('disabled')) 
    {
        navListItems.removeClass('btn-success').addClass('btn-default');
        $item.addClass('btn-success');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
    }
});

allNextBtn.click(function () 
{
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='text'], input[type='file'], input[type='url'], input[type='email'], input[type='date'],input[type='number']"),
        isValid = true;

    $(".form-group").removeClass("has-error");
    for (var i = 0; i < curInputs.length; i++) 
    {
        if (!curInputs[i].validity.valid) {
            isValid = false;
            $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
    }

    if (isValid) nextStepWizard.removeAttr('disabled').trigger('click').addClass('w3-green');
});

$('div.setup-panel div a.btn-success').trigger('click');
});
  </script>
<?= $this->endSection() ?>