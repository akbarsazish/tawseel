<div class="card mb-4">
    <div class="card-header">
        <h3 class="h4 mb-0"><?= lang('app.update_partnership_item') ?></h3>
    </div>
    <div class="card-body">
        <form id="myForm" data-url="<?= base_url('partnership/update/'. enc($parnership['id'])) ?>"  method="POST">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title_en">Title (English)</label>
                        <input type="text" class="form-control" id="title_en" name="title_en" value="<?= $parnership['title_en'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="subtitle_en"> Subitle (English)</label>
                        <input type="text" class="form-control" id="subtitle_en" name="subtitle_en" value="<?= $parnership['subtitle_en'] ?>" required>
                    </div>

                </div>
                <div class="col-lg-6">
                   <div class="form-group">
                        <label for="title_ar">Title (Arabic)</label>
                        <input type="text" class="form-control" id="title_ar" name="title_ar" value="<?= $parnership['title_ar'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="subtitle_ar"> Subitle (Arabic)</label>
                        <input type="text" class="form-control" id="subtitle_ar" name="subtitle_ar" value="<?= $parnership['subtitle_ar'] ?>" required>
                    </div>
                </div>
            </div>

             <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                <button onclick="loadMe('<?= base_url('partnership') ?>')" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i><?= lang('app.back') ?>
                </button>
                <button type="submit" class="btn btn-primary px-4">
                    <?= lang('app.update') ?> <i class="bi bi-check2 ms-2"></i>
                </button>
            </div>
        </form>
     </div>
   </div>
</div>