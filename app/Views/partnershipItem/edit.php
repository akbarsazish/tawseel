<div class="card mb-4">
    <div class="card-header">
        <h3 class="h4 mb-0"><?= lang('app.update_partnership_item') ?></h3>
    </div>
    <div class="card-body">

        <form id="myForm" data-url="<?= base_url('partnershipitem/update/'.enc($item['id'])) ?>"  method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Partnership</label>
                        <select name="partnership_id" class="form-control" required>
                            <?php foreach ($partnerships as $partnership): ?>
                            <option value="<?= $partnership['id'] ?>" 
                                <?= ($partnership['id'] == $item['partnership_id']) ? 'selected' : '' ?>>
                                <?= $partnership['title_en'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Title (English)</label>
                        <input type="text" name="title_en" class="form-control" 
                            value="<?= $item['title_en'] ?>" required>
                    </div>
                </div>

                <div class="col-lg-6">
                     <div class="form-group">
                        <label>Title (Arabic)</label>
                        <input type="text" name="title_ar" class="form-control" 
                            value="<?= $item['title_ar'] ?>" required>
                    </div>               
                </div>
                <div class="col-lg-6">
                     <div class="form-group">
                        <label>Description (English)</label>
                        <textarea name="description_en" class="form-control" required>
                            <?= $item['description_en'] ?>
                        </textarea>
                    </div>           
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Description (Arabic)</label>
                        <textarea name="description_ar" class="form-control" required>
                            <?= $item['description_ar'] ?>
                        </textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control-file">

                         <?php
                            $images = glob(WRITEPATH . 'uploads/partnership/item_' . $item['id'] . '.*');
                            if ($images):
                                $imageFile = $images[0];
                            ?>
                            <img src="<?= base_url('writable/uploads/partnership/' . basename($imageFile)) ?>" 
                                style="width:30%; height:auto;" class="mt-2" alt="Partnership Image">
                            <?php else: ?>
                                <p>No image found for item <?= esc($item['id']) ?></p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

             <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                <button onclick="loadMe('<?= base_url('partnershipitem') ?>')" class="btn btn-outline-secondary">
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