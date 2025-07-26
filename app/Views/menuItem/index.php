<div class="card mb-4">
    <div class="card-header">
         <div class="row">
            <div class="col-lg-6">
                <h5><?= lang('app.menu_item') ?></h5>
            </div>
            <div class="col-lg-6 text-end">   
                <a href="javascript:void(0)" onclick="loadMe('<?= base_url('menus/'.enc($menu['id']).'/items/create') ?>')" class="btn btn-sm btn-primary" >
                    <?= lang('app.add_menu_item') ?>  <i class="fa fa-plus"></i>
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Order</th>
                             <th><?= lang('app.title_en') ?></th>
                             <th><?= lang('app.title_ar') ?></th>
                            <th>URL</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($items as $item): ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['order'] ?></td>
                            <td><?= $item['title_en'] ?></td>
                            <td><?= $item['title_ar'] ?></td>
                             <td title="<?= htmlspecialchars($item['url']) ?>">
                               <?= strlen($item['url']) > 30 ? substr($item['url'], 0, 30) . '...' : $item['url'] ?>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="loadMe('<?= base_url('menus/' .enc($menu['id']). '/items/'.enc($item['id']). '/edit') ?>')" class="btn btn-sm btn-warning">
                                    Edit <i class="fa fa-edit"></i>
                                </a>
                                <form id="myForm" data-url="<?= base_url('menus/'.enc($menu['id']) . '/items/' .enc($item['id'])) ?>" method="POST" class="d-inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-sm btn-danger">
                                        Delete  <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

