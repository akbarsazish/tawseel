<div class="card mb-4">
    <div class="card-header">
        <h2 class="h4 mb-0"><?= esc($record['fullname']) ?> <?= lang('app.profile') ?></h2>
    </div>

  <?php if (session()->getFlashdata('success') || session()->getFlashdata('errors') || session()->getFlashdata('error')): ?>
  <div id="alert-container" class="w3-container" style="width: 100%; margin: 0 0 20px 0;">
    <?php if (session()->getFlashdata('success')): ?>
      <div class="w3-panel w3-pale-green w3-card w3-round-large" style="position: relative; margin-bottom: 15px; border-left: 4px solid #4CAF50; width: 100%;">
        <span onclick="this.parentElement.style.display='none'" 
              class="w3-button w3-display-topright w3-hover-none w3-text-green" 
              style="padding: 8px 12px; top: 2px; right: 2px;">&times;</span>
        <div style="padding: 12px 30px 12px 20px; display: flex; align-items: center; gap: 12px; max-width: 1200px; margin: 0 auto;">
          <i class="fas fa-check-circle w3-text-green" style="font-size: 1.5em;"></i>
          <div>
            <h4 style="margin: 0 0 4px 0; font-weight: 500;">Success!</h4>
            <p style="margin: 0;"><?= esc(session()->getFlashdata('success')) ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
      <div class="w3-panel w3-pale-red w3-card w3-round-large" style="position: relative; margin-bottom: 15px; border-left: 4px solid #f44336; width: 100%;">
        <span onclick="this.parentElement.style.display='none'" 
              class="w3-button w3-display-topright w3-hover-none w3-text-red" 
              style="padding: 8px 12px; top: 2px; right: 2px;">&times;</span>
        <div style="padding: 12px 30px 12px 20px; max-width: 1200px; margin: 0 auto;">
          <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 10px;">
            <i class="fas fa-exclamation-triangle w3-text-red" style="font-size: 1.5em;"></i>
            <h4 style="margin: 0; font-weight: 500;">Please fix these issues:</h4>
          </div>
          <ul style="margin: 0; padding-left: 40px;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
              <li style="margin-bottom: 5px;"><?= esc($error) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="w3-panel w3-pale-red w3-card w3-round-large" style="position: relative; margin-bottom: 15px; border-left: 4px solid #f44336; width: 100%;">
        <span onclick="this.parentElement.style.display='none'" 
              class="w3-button w3-display-topright w3-hover-none w3-text-red" 
              style="padding: 8px 12px; top: 2px; right: 2px;">&times;</span>
        <div style="padding: 12px 30px 12px 20px; display: flex; align-items: center; gap: 12px; max-width: 1200px; margin: 0 auto;">
          <i class="fas fa-exclamation-circle w3-text-red" style="font-size: 1.5em;"></i>
          <div>
            <h4 style="margin: 0 0 4px 0; font-weight: 500;">Error!</h4>
            <p style="margin: 0;"><?= esc(session()->getFlashdata('error')) ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th width="25%"><?= lang('app.fullname') ?></th>
                        <td><?= esc($record['fullname']) ?></td>
                    </tr>
                    <tr>
                        <th><?= lang('app.email') ?></th>
                        <td><?= esc($record['email']) ?></td>
                    </tr>
                    <tr>
                        <th><?= lang('app.phone_name') ?></th>
                        <td><?= esc($record['phone']) ?></td>
                    </tr>
                    
                    <?php if(getMy('type') != 'personal'): ?>
                    <tr>
                        <th><?= lang('app.cr') ?></th>
                        <td><?= esc($record['cr']) ?></td>
                    </tr>
                    <tr>
                        <th><?= lang('app.type') ?></th>
                        <td>
                            <?= lang('app.'.$record['type'])?>
                        </td>
                    </tr>
                    <tr>
                        <th><?= lang('app.sub_type') ?></th>
                        <td>
                            <?= lang('app.'.$record['sub_type'])?>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <?php if($record['sub_type'] == '1pl'):?>
                        <tr>
                            <th><?= lang('app.logistics_type') ?></th>
                        <td>
                            <?= lang('app.'.$record['logistics_type'])?>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr>
                        <th><?= lang('app.role') ?></th>
                        <td> 
                            <?php
                                $roles = explode(',', $record['role']);
                                $translatedRoles = [];
                                foreach ($roles as $role) 
                                {
                                    if (isset(lang('app.roles')[$role])) 
                                    {
                                        $translatedRoles[] = lang('app.roles')[$role];
                                    } 
                                    else 
                                    {
                                        $translatedRoles[] = $role;
                                    }
                                }
                                echo implode(', ', $translatedRoles);
                            ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <th><?= lang('app.province_state') ?></th>
                        <td><?= lang('app.provinces')[$record['province'] ?? ''] ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= lang('app.city') ?></th>
                        <td>
                            <?= !empty($record['province']) && !empty($record['city']) 
                                ? (lang("app.{$record['province']}.{$record['city']}") ?? $record['city']) 
                                : ($record['city'] ?? '') ?>
                        </td>
                    </tr>                   
                    <tr>
                        <th><?= lang('app.way_street') ?></th>
                        <td><?= esc($record['way'] ?? '') ?></td>
                    </tr>
                    <tr>
                        <th><?= lang('app.address_line1') ?></th>
                        <td><?= esc($record['address_line_1'] ?? '') ?></td>
                    </tr>
                    <tr>
                        <th><?= lang('app.address_line2') ?></th>
                        <td><?= esc($record['address_line_2'] ?? '') ?></td>
                    </tr>
                    <tr>
                        <th><?= lang('app.location') ?></th>
                        <td><?= esc($record['location'] ?? '') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

            <?php if (!empty($record['latitude']) && !empty($record['longitude'])): ?>
                <div class="map-container" style="border: 1px solid #dee2e6; border-radius: 0.25rem; overflow: hidden;">
                    <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?= $record['latitude'] ?>,<?= $record['longitude'] ?>&zoom=14&scale=2&size=1600x200&maptype=roadmap&markers=color:red%7C<?= $record['latitude'] ?>,<?= $record['longitude'] ?>&key=<?= env('GOOGLE_MAPS_API_KEY') ?>" alt="Location Map" style="width: 100%; height: auto;">
                </div>
            <?php else: ?>
                <div class="alert alert-warning">No location coordinates available to show map</div>
            <?php endif; ?>

            <div class="row mb-3">
                <div class="col-md-6 d-flex justify-content-start">
                    <button type="button" class="btn btn-outline-secondary" onclick="loadMe('<?= base_url('dashboard/users') ?>');">
                        <i class="bi bi-arrow-left me-2"></i><?= lang('app.back') ?>
                    </button>
                </div>

                <div class="col-md-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary px-4" onclick="loadMe('<?= base_url('dashboard/users/edit/'.enc($record['id'])) ?>');">
                        <i class="fas fa-edit ms-2"></i> <?= lang('app.edit') ?>
                    </button>
                </div>
            </div>   
    </div>
</div>