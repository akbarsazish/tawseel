<div class="card mb-4">
    <div class="card-header ">
        <div class="row">
            <div class="col-lg-6">
                <h5><?= lang('app.tawseel_info') ?></h5>
            </div>
            <div class="col-lg-6 text-right">
                <?php if ($siteInfo !== null): ?>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('siteinfo/edit/'.enc($siteInfo['id'])) ?>')" class="btn btn-primary">
                        Edit <i class="fa fa-edit"></i>
                    </a>
                    <button onclick="deleteSiteInfo('<?= base_url('/siteinfo/delete/') . enc($siteInfo['id']) ?>')" class="btn btn-danger">
                        delete <i class="fa fa-trash"></i>
                    </button>
                    <?php else: ?>
                      <a href="javascript:void(0)" onclick="loadMe('<?= base_url('siteinfo/create') ?>')" class="btn btn-primary" id="siteInfoAddBtn" >
                        Add  <i class="fa fa-plus"></i>
                     </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
             <?= view('partials/flash_messages') ?>
        </div>
    </div>

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
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th width="30%"> <?= lang('app.facebook') ?> </th>
                                    <td><?= $siteInfo['facebook'] ?? '<span class="text-muted">Not set</span>' ?></td>
                                </tr>
                                <tr>
                                    <th><?= lang('app.instagram') ?></th>
                                    <td><?= $siteInfo['instagram'] ?? '<span class="text-muted">Not set</span>' ?></td>
                                </tr>
                                <tr>
                                    <th><?= lang('app.x') ?></th>
                                    <td><?= $siteInfo['twitter'] ?? '<span class="text-muted">Not set</span>' ?></td>
                                </tr>
                                <tr>
                                    <th><?= lang('app.youtube') ?></th>
                                    <td><?= $siteInfo['youtube'] ?? '<span class="text-muted">Not set</span>' ?></td>
                                </tr>
                                <tr>
                                    <th><?= lang('app.linkedin') ?></th>
                                    <td><?= $siteInfo['linkedin'] ?? '<span class="text-muted">Not set</span>' ?></td>
                                    
                                </tr>
                                <tr>
                                    <th><?= lang('app.email') ?></th>
                                    <td><?= $siteInfo['email'] ?? '<span class="text-muted">Not set</span>' ?></td>
                                </tr>
                                <tr>
                                    <th> <?= lang('app.phone') ?> </th>
                                    <td> <?= $siteInfo['phone'] ?? '<span class="text-muted">Not set</span>' ?></td>
                                </tr>
                                <tr>
                                    <th> <?= lang('app.address_ar') ?> </th>
                                    <td> <?= $siteInfo['address_ar'] ?? '<span class="text-muted">Not set</span>' ?></td>
                                </tr>
                                <tr>
                                    <th> <?= lang('app.address_en') ?> </th>
                                    <td> <?= $siteInfo['address_en'] ?? '<span class="text-muted">Not set</span>' ?></td>
                                </tr>
                                <tr>
                                    <th> <?= lang('app.location') ?> </th>
                                    <td>
                                        <?php if (!empty($siteInfo['location'])) : ?>
                                            <div class="embed-responsive">
                                                <?= $siteInfo['location'] ?>
                                            </div>
                                        <?php else : ?>
                                            <span class="text-muted">Not set</span>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
    </div>
</div>
