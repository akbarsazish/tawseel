<div class="card mb-4">
    <div class="card-header">
                <div class="row">
            <div class="col-lg-6">
                <h5><?= lang('app.homeinfo') ?></h5>
            </div>
            <div class="col-lg-6 text-right">
                <?php if ($homeInfos !== null): ?>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('homeinfo/create') ?>')" class="btn btn-primary" id="siteInfoAddBtn" >
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
                        <table class="table table-striped">
            <thead>
                <tr>
                    <th> Id </th>
                    <th><?= lang('app.home_info_title_en') ?> </th>
                    <th><?= lang('app.home_info_title_ar') ?></th>
                    <th><?= lang('app.home_info_title2_en') ?></th>
                    <th><?= lang('app.home_info_title2_ar') ?></th>
                    <th><?= lang('app.home_info_details_ar') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($homeInfos)): ?>
                    <?php foreach ($homeInfos as $homeInfo): ?>
                        <tr>
                            <td><?= esc($homeInfo['id']) ?></td>
                            <td><?= esc($homeInfo['title_en']) ?> </td>
                            <td><?= esc($homeInfo['title_ar']) ?></td>
                            <td><?= esc($homeInfo['title2_en']) ?></td>
                            <td><?= esc($homeInfo['title2_ar']) ?></td>
                            <td>
                                 <a href="#" onclick="loadMe('<?= base_url('homeinfo/show/'. esc(enc($homeInfo['id'])) ) ?>')" class="w3-button">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7">No records found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>       
            </div>
        </div>
    </div>
</div>

