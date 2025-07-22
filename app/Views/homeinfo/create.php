<div class="card mb-4">
    <div class="card-header">
        <h3 class="h4 mb-0"><?= lang('app.add_home_content') ?></h3>
    </div>
    <div class="card-body">
     <form id="myForm" data-url="<?= base_url('homeinfo/save') ?>"  method="POST">
        <?= csrf_field() ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="title_ar">Title (Arabic)</label>
                    <input type="text" name="title_ar" id="title_ar" class="form-control" 
                        value="<?= old('title_ar', $siteInfo->title_ar ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="title_en">Title (English)</label>
                    <input type="text" name="title_en" id="title_en" class="form-control" 
                        value="<?= old('title_en', $siteInfo->title_en ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="description_ar">Description (Arabic) </label>
                    <textarea name="description_ar" id="description_ar" class="form-control" 
                            rows="3"><?= old('description_ar', $siteInfo->description_ar ?? '') ?></textarea>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="title2_ar">Title2 (Arabic)</label>
                    <input type="text" name="title2_ar" id="title2_ar" class="form-control" 
                        value="<?= old('title2_ar', $siteInfo->title2_ar ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="title2_en">Title2 (English)</label>
                    <input type="text" name="title2_en" id="title2_en" class="form-control" 
                        value="<?= old('title2_en', $siteInfo->title2_en ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="description_en">Description (English) </label>
                    <textarea name="description_en" id="description_en" class="form-control" 
                        rows="3"><?= old('description_en', $siteInfo->description_en ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
            <button onclick="loadMe('<?= base_url('homeinfo') ?>')" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i><?= lang('app.back') ?>
            </button>
            <button type="submit" class="btn btn-primary px-4">
                <?= lang('app.save') ?> <i class="bi bi-check2 ms-2"></i>
            </button>
        </div>
    </form>
</div>
</div>
</div>
