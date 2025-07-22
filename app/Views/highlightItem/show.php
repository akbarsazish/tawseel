
<div class="card">
   <div class="card-header ">
        <div class="row">
            <div class="col-lg-6">
                <h5><?= lang('app.key_highlight_Item') ?></h5>
            </div>
            <div class="col-lg-6 text-right">
                <a href="javascript:void(0)" onclick="loadMe('<?= base_url('highlightitems/edit/'. enc($highlightItem['id'])) ?>')" class="btn btn-primary"> Edit <i class="fa fa-edit"></i>  </a>
                <button onclick="deleteHomeInfo('<?= base_url('/highlightitems/delete/'. enc($highlightItem['id']))?>')" class="btn btn-danger">
                    delete <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
    
    <div class="card-body p-2">
        <div class="row border rounded">
            <div class="col-lg-6 p-4">
                <p class="border-bottom"> <strong> Title : </strong> <?= esc($highlightItem['title_en']) ?></p> 
                <p class="border-bottom"> <strong> Description : </strong> <?= esc($highlightItem['description_en']) ?> </p>
            </div>
            <div class="col-lg-6 p-4 text-right">
                <p class="border-bottom"> <strong> تایتل : </strong> <?= esc($highlightItem['title_ar']) ?></p>
                <p class="border-bottom"> <strong> توضیحات  : </strong> <?= esc($highlightItem['description_ar']) ?></p>
            </div>
            
        </div>
    </div>
</div>
