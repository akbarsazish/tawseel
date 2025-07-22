<div class="card mb-4">
    <div class="card-header">
        <h4><?=lang('app.user_list')?></h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="container-fluid mt-5">
                <form id="myForm" data-url="<?= current_url() ?>">
                    <?= csrf_field() ?>
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="w3-input w3-col m10" 
                            placeholder="<?= lang('app.search_title') ?>" 
                            value="<?= esc($search_term ?? '') ?>" required>
                        
                        <button type="button" class="w3-button w3-grey w3-col m1" onclick="clearSearch()">
                            <i class="fas fa-times"></i> <?= lang('app.clear') ?>
                        </button>
                        
                        <button class="w3-button w3-blue w3-col m1" type="submit">
                            <i class="fas fa-search"></i> <?= lang('app.search') ?>
                        </button>
                    </div>
                </form>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?= lang('app.fullname') ?></th>
                            <th><?= lang('app.email') ?></th>
                            <th><?= lang('app.phone_name') ?></th>
                            <th><?= lang('app.type') ?></th>
                            <th><?= lang('app.role') ?></th>
                            <th><?=lang('app.view')?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($users)): ?>
                            <tr>
                                <td colspan="<?= auth('user_edit') ? '7' : '6' ?>" class="text-center py-4">
                                    <i class="fas fa-info-circle fa-2x mb-3" style="color: #6c757d;"></i>
                                    <h5><?= lang('app.no_records_found') ?></h5>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= esc($user['fullname']) ?></td>
                                    <td><?= esc($user['email']) ?></td>
                                    <td><?= esc($user['phone']) ?></td>
                                    <td><?= esc(lang('app.'.$user['type'])) ?></td>
                                    <td style="max-width: 200px; white-space: normal; word-wrap: break-word; overflow-wrap: break-word;">
                                        <?php
                                            $roles = explode(',', $user['role']);
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
                                    <td>
                                        <a href="javascript:void(0);" onclick="loadMe('<?= base_url('dashboard/users/profile/'.enc(esc($user['id']))) ?>');" class="w3-button"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>        
                
                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <!-- Previous Page Link -->
                        <li class="page-item <?= !$pagination['has_previous'] ? 'disabled' : '' ?>">
                            <a class="page-link" 
                            href="javascript:void(0);" 
                            onclick="<?= $pagination['has_previous'] ? "loadMe('".current_url().'?search='.esc($search_term).'&page='.($pagination['current_page'] - 1)."')" : '' ?>"
                            aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        
                        <!-- Page Numbers -->
                        <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                            <li class="page-item <?= $i == $pagination['current_page'] ? 'active' : '' ?>">
                                <a class="page-link" 
                                href="javascript:void(0);" 
                                onclick="loadMe('<?=current_url().'?search='.esc($search_term).'&page='.$i?>')">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                        
                        <!-- Next Page Link -->
                        <li class="page-item <?= !$pagination['has_next'] ? 'disabled' : '' ?>">
                            <a class="page-link" 
                            href="javascript:void(0);" 
                            onclick="<?= $pagination['has_next'] ? "loadMe('" . current_url().'?search='.esc($search_term).'&page=' . ($pagination['current_page'] + 1) . "')" : '' ?>"
                            aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Showing entries info -->
                <div class="text-center text-muted" id="entries-info">
                    Showing <?= (($pagination['current_page'] - 1) * $pagination['per_page']) + 1 ?> 
                    to <?= min($pagination['current_page'] * $pagination['per_page'], $pagination['total_items']) ?> 
                    of <?= $pagination['total_items'] ?> entries
                </div>
            </div>
        </div>
    </div>
</div>