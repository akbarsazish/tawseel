<div class="card mb-4">
    <div class="card-header">
         <div class="row">
            <div class="col-lg-6">
                <h5><?= lang('app.partnership_item') ?></h5>
            </div>
            <div class="col-lg-6 text-right">
                <?php if ($items !== null): ?>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('partnershipitem/create') ?>')" class="btn btn-primary">
                        Add  <i class="fa fa-plus"></i>
                    </a>
                    <?php else: ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
             <?= view('partials/flash_messages') ?>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="container-fluid mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?= lang('app.title_en') ?></th>
                        <th><?= lang('app.title_ar') ?></th>
                        <th>Image</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['title_en'] ?></td>
                        <td><?= $item['title_ar'] ?></td>
                        <td>
                            <?php
                                $images = glob(WRITEPATH . 'uploads/partnership/item_' . $item['id'] . '.*');
                                if ($images):
                                    $imageFile = $images[0];
                                ?>
                                <img src="<?=base_url('loadimg/partnership/' . basename($imageFile))?>"
                                style="width:100px; border-radius:5px;" class="mt-2" alt="Partnership Image">
                                <?php else: ?>
                                    <p>No image found for item <?= esc($item['id']) ?></p>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a class="w3-button" href="javascript:void(0)" onclick="loadMe('<?= base_url('partnershipitem/show/'. esc(enc($item['id'])) ) ?>')" >
                                <i class="fa fa-eye fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
