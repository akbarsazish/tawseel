<div class="card mb-4">
    <div class="card-header">
        <h3 class="h4 mb-0"><?= lang('app.upgrade_account') ?></h3>
    </div>
    <div class="card-body">
        <form role="form" id="myForm" method="POST" data-url="<?= base_url('mybusiness/upgrade') ?>">
            <?= csrf_field() ?>
            <div class="row gy-4">
                <!-- Row 1: Full Name and record Type -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="fullname" class="form-label"><?= lang('app.fullname') ?></label>
                        <input type="text" class="form-control form-control" id="fullname" name="fullname" required 
                               placeholder="<?= lang('app.fullname_title') ?>"
                               value="<?= $record['fullname'] ?? '' ?>">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="type" class="form-label"><?= lang('app.account_type') ?></label>
                        <select name="type" id="type" class="form-control form-control" required>
                            <option value="eCommerce" <?= ($record['type'] ?? '') == 'eCommerce' ? 'selected' : '' ?>><?= lang('app.eCommerce') ?></option>
                            <option value="logistics" <?= ($record['type'] ?? '') == 'logistics' ? 'selected' : '' ?>><?= lang('app.logistics') ?></option>
                        </select>
                    </div>
                </div>
                
                <!-- Row 2: CR Number and Sub Type -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="cr" class="form-label"><?= lang('app.cr') ?></label>
                        <input type="text" class="form-control form-control" id="cr" name="cr" required
                               placeholder="<?= lang('app.cr_title') ?>"
                               value="<?= $record['cr'] ?? '' ?>">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sub_type" class="form-label"><?= lang('app.sub_type') ?></label>
                        <select name="sub_type" id="sub_type" class="form-control form-control" required>
                            <?php if (($record['type'] ?? '') == 'eCommerce'): ?>
                                <option value="b2b" <?= ($record['sub_type'] ?? '') == 'b2b' ? 'selected' : '' ?>><?= lang('app.b2b') ?></option>
                                <option value="b2c" <?= ($record['sub_type'] ?? '') == 'b2c' ? 'selected' : '' ?>><?= lang('app.b2c') ?></option>
                                <option value="c2c" <?= ($record['sub_type'] ?? '') == 'c2c' ? 'selected' : '' ?>><?= lang('app.c2c') ?></option>
                            <?php else: ?>
                                <option value="1pl" <?= ($record['sub_type'] ?? '') == '1pl' ? 'selected' : '' ?>><?= lang('app.1pl') ?></option>
                                <option value="2pl" <?= ($record['sub_type'] ?? '') == '2pl' ? 'selected' : '' ?>><?= lang('app.2pl') ?></option>
                                <option value="3_4pl" <?= ($record['sub_type'] ?? '') == '3_4pl' ? 'selected' : '' ?>><?= lang('app.3_4pl') ?></option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                
                <!-- Row 3: Email and Phone -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label"><?= lang('app.email') ?></label>
                        <input type="email" class="form-control form-control" id="email" name="email" required 
                               placeholder="<?= lang('app.email_title') ?>"
                               value="<?= $record['email'] ?? '' ?>">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label"><?= lang('app.phone_name') ?></label>
                        <input type="text" class="form-control form-control" id="phone" name="phone" required 
                               placeholder="<?= lang('app.phone_title') ?>"
                               value="<?= $record['phone'] ?? '' ?>"
                               oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8);">
                    </div>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="d-flex justify-content-between align-items-center mt-5 pt-3 border-top">
                <button type="button" class="btn btn-outline-secondary btn" onclick="location.reload();">
                    <i class="bi bi-arrow-left me-2"></i><?= lang('app.back') ?>
                </button>
                <button type="submit" class="btn btn-primary px-4 btn">
                    <?= lang('app.update') ?><i class="bi bi-check2 ms-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    // Function to update sub_type options based on selected type
    function updateSubTypeOptions() {
        const type = $('#type').val();
        const subType = '<?= $record["sub_type"] ?? "" ?>';
        
        if (type === 'eCommerce') {
            $('#sub_type').html(`
                <option value="b2b" ${subType === 'b2b' ? 'selected' : ''}>${'<?= lang('app.b2b') ?>'}</option>
                <option value="b2c" ${subType === 'b2c' ? 'selected' : ''}>${'<?= lang('app.b2c') ?>'}</option>
                <option value="c2c" ${subType === 'c2c' ? 'selected' : ''}>${'<?= lang('app.c2c') ?>'}</option>
            `);
        } else {
            $('#sub_type').html(`
                <option value="1pl" ${subType === '1pl' ? 'selected' : ''}>${'<?= lang('app.1pl') ?>'}</option>
                <option value="2pl" ${subType === '2pl' ? 'selected' : ''}>${'<?= lang('app.2pl') ?>'}</option>
                <option value="3_4pl" ${subType === '3_4pl' ? 'selected' : ''}>${'<?= lang('app.3_4pl') ?>'}</option>
            `);
        }
    }

    // Initialize sub_type options on page load
    updateSubTypeOptions();

    // Update sub_type options when type changes
    $('#type').change(function() {
        updateSubTypeOptions();
    });
});
</script>