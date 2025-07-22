

<div class="card mb-4">
    <div class="card-header">
        <h3 class="h4 mb-0"><?= lang('app.edit_menu') ?></h3>
    </div>
    <div class="card-body">
        <form id="myForm" data-url="<?= base_url('update/'.enc($menu['id'])) ?>">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT" />

            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Menu Title</label>
                        <input type="text" name="title_en" class="form-control" required value="<?= $menu['title_en'] ?? '' ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Menu Title</label>
                        <input type="text" name="title_ar" class="form-control" required value="<?= $menu['title_ar'] ?? '' ?>">
                    </div>
                </div>
            
            </div>
        
            <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                <button onclick="loadMe('<?= base_url('menus') ?>')" class="btn btn-outline-secondary">
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