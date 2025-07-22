
<div class="card mb-4">
    <div class="card-header">
        <h3 class="h4 mb-0"><?= lang('app.add_menu_item') ?></h3>
    </div>
        <div class="card-body">
            <form id="myForm" data-url="<?= base_url('menuItem/'.enc($menu['id'])) ?>"  method="POST">
                <?= csrf_field() ?>
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Title (English) </label>
                            <input type="text" name="title_en" class="form-control" required value="<?= $item['title_en'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Title (Arabic) </label>
                            <input type="text" name="title_ar" class="form-control" required value="<?= $item['title_ar'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">URL</label>
                            <input type="text" name="url" class="form-control" required value="<?= $item['url'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" required value="<?= $item['order'] ?? 0 ?>">
                        </div>
                    </div>
                </div>
                    <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                    <button onclick="loadMe('<?= base_url('menus/'.enc($menu['id']). '/items') ?>')" class="btn btn-outline-secondary">
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

