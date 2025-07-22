<div class="card mb-4">
    <div class="card-header">
        <h3 class="h4 mb-0"><?= lang('app.update_home_content') ?></h3>
    </div>
    <div class="card-body">
        <form id="myForm" data-url="<?= base_url('homeinfo/update/'.enc($homeInfo['id'])) ?>"  method="POST">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title_en">Title (English)</label>
                        <input type="text" class="form-control" id="title_en" name="title_en" value="<?= $homeInfo['title_en'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="title2_en">Secondary Title (English)</label>
                        <input type="text" class="form-control" id="title2_en" name="title2_en" value="<?= $homeInfo['title2_en'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description_en">Description (English)</label>
                        <textarea class="form-control" id="description_en" name="description_en" rows="5" required><?= $homeInfo['description_en'] ?></textarea>
                    </div>

                </div>
                <div class="col-lg-6">
                   <div class="form-group">
                        <label for="title_ar">Title (Arabic)</label>
                        <input type="text" class="form-control" id="title_ar" name="title_ar" value="<?= $homeInfo['title_ar'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="title2_ar">Secondary Title (Arabic)</label>
                        <input type="text" class="form-control" id="title2_ar" name="title2_ar" value="<?= $homeInfo['title2_ar'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description_ar">Description (Arabic)</label>
                        <textarea class="form-control" id="description_ar" name="description_ar" rows="5" required><?= $homeInfo['description_ar'] ?></textarea>
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