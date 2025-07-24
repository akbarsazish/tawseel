
<div class="card">
   <div class="card-header ">
        <div class="row">
            <div class="col-lg-6">
                <h5><?= lang('app.partnership') ?></h5>
            </div>

            <div class="col-lg-6 text-end">
                <?php if ($partnerships !== null && isset($partnerships['id'])): ?>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('partnership/edit/'. enc($partnerships['id'])) ?>')" class="btn btn-primary"> Edit <i class="fa fa-edit"></i>  </a>
                    <button onclick="deletePartner('<?= base_url('/partnership/delete/') . enc($partnerships['id']) ?>')" class="btn btn-danger">
                        delete <i class="fa fa-trash"></i>
                    </button>
                <?php else: ?>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('partnership/create') ?>')" class="btn btn-primary">
                        Add  <i class="fa fa-plus"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
             <?= view('partials/flash_messages') ?>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body">
     <div class="row">
        <div class="col-lg-12">
            <?php if (session('message')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session('message') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>

            <div class="card-body p-2">
                <div class="row border rounded">
                    <div class="col-lg-6 p-4">
                        <p> <strong><?= lang('app.title_en') ?>:</strong> <?= isset($partnerships['title_en']) ? esc($partnerships['title_en']) : '' ?> </p>
                        <p> <strong><?= lang('app.subtitle_en') ?>:</strong> <?= isset($partnerships['subtitle_en']) ? esc($partnerships['subtitle_en']) : '' ?> </p>
                    </div>
                    <div class="col-lg-6 p-4 text-right" dir="rtl">
                        <p class="text-right"> <strong><?= lang('app.title_ar') ?>:</strong> <?= isset($partnerships['title_ar']) ? esc($partnerships['title_ar']) : '' ?></p>
                        <p class="text-right"> <strong><?= lang('app.subtitle_ar') ?>:</strong> <?= isset($partnerships['subtitle_ar']) ? esc($partnerships['subtitle_ar']) : '' ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>