
<div class="card">
   <div class="card-header ">
        <div class="row">
            <div class="col-lg-6">
                <h5><?= lang('app.partnership_title') ?></h5>
            </div>
            
            <div class="col-lg-6 text-end">
                <a href="javascript:void(0)" onclick="loadMe('<?= base_url('partnershipitem/edit/'. enc($partner['id'])) ?>')" class="btn btn-sm btn-primary"> Edit <i class="fa fa-edit"></i>  </a>
                <button onclick="deletePartnerItem('<?= base_url('/partnershipitem/delete/') . enc($partner['id']) ?>')" class="btn btn-sm btn-danger">
                    delete <i class="fa fa-trash"></i>
                </button>
            </div>`
        </div>
    </div>
    
    <div class="card-body p-2">
        <div class="row">
            <div class="col-lg-6 p-4">
                <p> <strong> <?= lang('app.title_en') ?> </strong> <?= esc($partner['title_en']) ?></p> 
                <p> <strong> <?= lang('app.desc_en') ?> : </strong> <?= esc($partner['description_en']) ?> </p>
            </div>
            <div class="col-lg-6 p-4 text-end" dir="rtl">
                <p> <strong> <?= lang('app.title_ar') ?> : </strong> <?= esc($partner['title_ar']) ?></p>
                <p> <strong> <?= lang('app.desc_ar') ?>   : </strong> <?= esc($partner['description_ar']) ?></p>
            </div>
            <div class="col-lg-12 text-center">
                <?php
                    $images = glob(WRITEPATH . 'uploads/partnership/item_' . $partner['id'] . '.*');
                    if ($images):
                        $imageFile = $images[0];
                    ?>
                    <img src="<?=base_url('loadimg/partnership/' . basename($imageFile))?>"
                        style="width:33%; height:auto;" class="mt-2" alt="Partnership Image">
                    <?php else: ?>
                        <p> No image found for item <?= esc($partner['id']) ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
