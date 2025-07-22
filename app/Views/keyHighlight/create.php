<div class="card mb-4">
    <div class="card-header">
        <h3 class="h4 mb-0"><?= lang('app.add_home_content') ?></h3>
    </div>
    <div class="card-body">
     <form id="myForm" data-url="<?= base_url('keyhighlight/save') ?>"  method="POST">
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
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="subtitle_ar">Subtitle (Arabic)</label>
                    <input type="text" name="subtitle_ar" id="subtitle_ar" class="form-control" 
                        value="<?= old('subtitle_ar', $siteInfo->subtitle_ar ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="subtitle_en">Subtitle (English)</label>
                    <input type="text" name="subtitle_en" id="subtitle_en" class="form-control" 
                        value="<?= old('subtitle_en', $siteInfo->subtitle_en ?? '') ?>">
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
            <button onclick="loadMe('<?= base_url('keyhighlight') ?>')" class="btn btn-outline-secondary">
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
