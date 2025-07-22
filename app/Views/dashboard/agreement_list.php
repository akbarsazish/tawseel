<div class="card mb-4">
    <div class="card-header">
        <h4><?=lang('app.agreement_templates')?></h4>
    </div>
<?php if(session()->getFlashdata('success')):?>
    <div id="alert" class="w3-container w3-animate-opacity" style="width: 30%; margin:0; position: fixed; top: 4%; left: 50%; transform: translate(-50%, -50%); z-index: 1000;">
      <div class="w3-pale-green w3-margin-top w3-card w3-round-large" style="position: relative; border-left: 4px solid #4CAF50; width: 100%;">
        <span onclick="$('#alert').hide();" class="w3-button w3-display-topright w3-hover-none w3-text-green" style="padding: 8px 12px; top: 2px; right: 2px;">&times;</span>
        <div style="padding: 12px 30px 12px 20px; display: flex; align-items: center; gap: 12px; max-width: 1200px; margin: 0 auto;">
          <i class="fas fa-check-circle w3-text-green" style="font-size: 1.5em;"></i>
          <div>
            <h4 style="margin: 0 0 4px 0; font-weight: 500;"><?= lang('app.agreement_deleted_successfully')?></h4>
          </div>
        </div>
      </div>
  </div>
  <?php endif?>

    <div class="card-body">
        <div class="row">
            <div class="container-fluid">

                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"  aria-expanded="false">
                        <i class="fas fa-plus"></i> 
                        <?= lang('app.create') ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li onclick="loadMe('<?= base_url('dashboard/agreement/create/'.enc('1plc')) ?>');">
                            <a class="dropdown-item" href="javascript:void(0)"><?=lang('app.1plc')?></a>
                        </li>
                        <li onclick="loadMe('<?= base_url('dashboard/agreement/create/'.enc('1pli')) ?>');">
                            <a class="dropdown-item" href="javascript:void(0)"><?=lang('app.1pli')?></a>
                        </li>
                        <li onclick="loadMe('<?= base_url('dashboard/agreement/create/'.enc('2pl')) ?>');">
                            <a class="dropdown-item" href="javascript:void(0)"><?=lang('app.2pll')?></a>
                        </li>
                        <li onclick="loadMe('<?= base_url('dashboard/agreement/create/'.enc('34pl')) ?>');">
                            <a class="dropdown-item" href="javascript:void(0)"><?=lang('app.34pll')?></a>
                        </li>
                        <li onclick="loadMe('<?= base_url('dashboard/agreement/create/'.enc('b2b')) ?>');">
                            <a class="dropdown-item" href="javascript:void(0)"><?=lang('app.b2b')?></a>
                        </li>
                        <li onclick="loadMe('<?= base_url('dashboard/agreement/create/'.enc('b2c')) ?>');">
                            <a class="dropdown-item" href="javascript:void(0)"><?=lang('app.b2c')?></a>
                        </li>
                        <li onclick="loadMe('<?= base_url('dashboard/agreement/create/'.enc('c2c')) ?>');">
                            <a class="dropdown-item" href="javascript:void(0)"><?=lang('app.c2c')?></a>
                        </li>

                        
                    </ul>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?= lang('app.number') ?></th>    
                            <th><?= lang('app.type') ?></th>
                            <th><?= lang('app.legal_name') ?></th>
                            <th><?= lang('app.version') ?></th>
                            <th><?= lang('app.created_at') ?></th>
                            <th><?=lang('app.view')?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($records)): ?>
                            <tr class="text-center align-middle">
                                <td colspan="6" class="py-4 text-muted">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <i class="fas fa-info-circle fa-2x mb-3" style="color: var(--bs-gray-500);"></i>
                                        <h5 class="mb-0"><?= lang('app.no_records_found') ?></h5>
                                        <?php if(isset($show_add_button) && $show_add_button): ?>
                                            <button class="btn btn-primary mt-3" onclick="loadMe('<?= $add_route ?>')">
                                                <i class="fas fa-plus me-2"></i>
                                                <?= lang('app.add_first_record') ?>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php else:
                                $z=1; 
                                foreach ($records as $r): ?>
                                <tr>
                                    <td><?= esc($z) ?></td>
                                    <td><?= lang('app.'.$r['sub_type']) ?></td>
                                    <td><?= esc($r['legal_name']) ?></td>
                                    <td><?= esc($r['version']) ?></td>
                                    <td><?= esc($r['created_at']) ?></td>
                                    
                                    <td>
                                        <a href="javascript:void(0);" onclick="loadMe('<?= base_url('dashboard/agreement/view/'.enc(esc($r['id']))) ?>');" class="w3-button"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $z++;
                                endforeach;
                                endif; 
                            ?>
                    </tbody>
                </table>        
                
            </div>
        </div>
    </div>
</div>