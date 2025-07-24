<div class="card mb-4">
    <div class="card-header">
         <div class="row">
            <div class="col-lg-6">
                <h5><?= lang('app.add_key_highlight') ?></h5>
            </div>
            <div class="col-lg-6 text-end">
                <?php if ($highlightItems !== null): ?>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('highlightitems/create') ?>')" class="btn btn-primary" id="siteInfoAddBtn" >
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
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> Id </th>
                        <th><?= lang('app.highlight_item_icon') ?> </th>
                        <th><?= lang('app.highlight_item_title') ?></th>
                        <th><?= lang('app.highlight_item_title') ?></th>
                        <th><?= lang('app.highlight_item_desc') ?></th>
                        <th><?= lang('app.highlight_item_desc') ?></th>
                        <th> Detials </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($highlightItems)): ?>
                        <?php foreach ($highlightItems as $highlightItem): ?>
                            <tr>
                                <td><?= esc($highlightItem['id']) ?> </td>
                                <td><?= esc($highlightItem['icon']) ?> </td>
                                <td><?= esc($highlightItem['title_en']) ?> </td>
                                <td><?= esc($highlightItem['title_ar']) ?> </td>
                                <td><?= esc($highlightItem['description_en']) ?> </td>
                                <td><?= esc($highlightItem['description_ar']) ?> </td>
                                <td>
                                    <a class="w3-button" href="javascript:void(0)" onclick="loadMe('<?= base_url('highlightitems/show/'. esc(enc($highlightItem['id'])) ) ?>')"  id="siteInfoAddBtn" >
                                    <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr class="text-center"><td colspan="7">No records found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

