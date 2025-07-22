<div class="card mb-4">
    <div class="card-header">
        <h3 class="h4 mb-0"><?= lang('app.add_partnership_item') ?></h3>
    </div>
    <div class="card-body">

    <form id="myForm" data-url="<?= base_url('partnershipitem/save') ?>"  method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Partnership</label>
                    <select name="partnership_id" class="form-control" required>
                        <?php foreach ($partnerships as $partnership): ?>
                        <option value="<?= $partnership['id'] ?>"><?= $partnership['title_en'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Title (English)</label>
                    <input type="text" name="title_en" class="form-control" required>
                </div>                   
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Title (Arabic)</label>
                    <input type="text" name="title_ar" class="form-control" required>
                </div>         
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Description (English)</label>
                    <textarea name="description_en" class="form-control" required></textarea>
                </div>           
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Description (Arabic)</label>
                    <textarea name="description_ar" class="form-control" required></textarea>
                </div>          
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file" required>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
            <button onclick="loadMe('<?= base_url('partnershipitem') ?>')" class="btn btn-outline-secondary">
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
