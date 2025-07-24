<div class="card mb-4">
   <div class="card-header ">
        <div class="row">
            <div class="col-lg-6">
                <h5><?= lang('app.homeinfo') ?></h5>
            </div>
            <div class="col-lg-6 text-end">
                <a href="javascript:void(0)" onclick="loadMe('<?= base_url('homeinfo/edit/'. enc($homeInfo['id'])) ?>')" class="btn btn-primary"> Edit <i class="fa fa-edit"></i>  </a>
                <button onclick="deleteHomeInfo('<?= base_url('/homeinfo/delete/'. enc($homeInfo['id']))?>')" class="btn btn-danger">
                    delete <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 p-4">
                <p class="border-bottom"> <strong> Title : </strong> <?= esc($homeInfo['title_en']) ?></p> 
                <p class="border-bottom"> <strong> Title 2 : </strong> <?= esc($homeInfo['title2_en']) ?></p>
                <p class="border-bottom"> <strong> Description : </strong> <?= esc($homeInfo['description_en']) ?> </p>
            </div>
            <div class="col-lg-6 p-4 text-end">
                <p class="border-bottom"> <strong> تایتل : </strong> <?= esc($homeInfo['title_ar']) ?></p>
                <p class="border-bottom"> <strong> تایتل دوم : </strong> <?= esc($homeInfo['title2_ar']) ?></p>
                <p class="border-bottom"> <strong> توضیحات  : </strong> <?= esc($homeInfo['description_ar']) ?></p>
            </div>
        </div>
    </div>
</div>
