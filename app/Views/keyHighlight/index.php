
<div class="card">
   <div class="card-header ">
        <div class="row">
            <div class="col-lg-6">
                <h5><?= lang('app.key_highlight') ?></h5>
            </div>
            <div class="col-lg-6 text-end">
                <?php if ($highLights !== null): ?>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('keyhighlight/edit/'. enc($highLights['id'])) ?>')" class="btn btn-primary"> Edit <i class="fa fa-edit"></i>  </a>
                    <button onclick="deleteKeyHighlight('<?= base_url('/keyhighlight/delete/') . enc($highLights['id']) ?>')" class="btn btn-danger">
                        delete <i class="fa fa-trash"></i>
                    </button>
                    <?php else: ?>
                        <a href="javascript:void(0)" onclick="loadMe('<?= base_url('keyhighlight/create') ?>')" class="btn btn-primary" id="siteInfoAddBtn" >
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
                <div class="row">
                    <div class="col-lg-6 p-4">
                        <p class="border-bottom">  <strong> Title: </strong> <?= isset($highLights['title_en']) ? esc($highLights['title_en']) : '' ?> </p>
                        <p class="border-bottom">  <strong> Subtitle </strong> <?= isset($highLights['subtitle_en']) ? esc($highLights['subtitle_en']) : '' ?> </p>
                    </div>
                    <div class="col-lg-6 p-4 text-end">
                        <p class="border-bottom ">  <strong> تایتل </strong> <?= isset($highLights['title_ar']) ? esc($highLights['title_ar']) : '' ?></p>
                        <p class="border-bottom ">  <strong> تایتل فرعی </strong> <?= isset($highLights['subtitle_ar']) ? esc($highLights['subtitle_ar']) : '' ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>