
<div class="card mb-4">
    <div class="card-header">
         <div class="row">
            <div class="col-lg-6">
                <h5><?= lang('app.menu') ?></h5>
            </div>
            <div class="col-lg-6 text-end">
                <a href="javascript:void(0)" onclick="loadMe('<?= base_url('menus/create') ?>')" class="btn btn-primary" id="siteInfoAddBtn" >
                    <?= lang('app.add_menu') ?> <i class="fa fa-plus"></i>
                </a>
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
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody>
                    <?php foreach($menus as $menu): ?>
                    <tr>
                        <td><?= $menu['id'] ?></td>
                        <td><?= $menu['title_en'] ?></td>
                        <td><?= $menu['title_ar'] ?></td>
                        <td>
                            <a href="javascript:void(0)" onclick="loadMe('<?= base_url('menus/' . enc($menu['id']). '/edit') ?>')" class="btn btn-sm btn-primary" >
                                Edit  <i class="fa fa-edit"></i>
                            </a>
                           
                           <button onclick="deleteMenu('<?= base_url('/menus/' . enc($menu['id'])) ?>')" class="btn btn-sm btn-danger">
                                delete <i class="fa fa-trash"></i>
                            </button>
                            
                        <a href="javascript:void(0)" onclick="loadMe('<?= base_url('menus/' .enc($menu['id']) . '/items') ?>')" class="btn btn-sm btn-info">Manage Items <i class="fa fa-list"></i> </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
