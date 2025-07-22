<!DOCTYPE html>
<html lang="<?=sess()->get('lang')?>">
  <head>
  <title><?= $this->renderSection('title') ?></title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="<?= lang('app.keywords') ?>">
    <meta name="description" content="<?= lang('app.description') ?>">
    <meta name="author" content="<?= lang('app.author') ?>">
    <link rel="shortcut icon" href="<?=base_url('favicon.ico')?>" type="image/x-icon">
    <link href="<?=base_url('assets/css/ostyles.css')?>" rel="stylesheet">
    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c529debf55.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://www.jqueryscript.net/demo/Multi-Select-Plugin-jQuery-MagicSuggest/magicsuggest.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/css/backendStyle.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/dashboard.css')?>">
</head>
<body>
<!-- Header -->

<header class="header">
    <nav class="navbar navbar-expand-md navbar-light pt-0 pb-0">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand p-0 mr-5" href="<?=base_url()?>"><img src="<?=base_url('loadimg/img/logo.png')?>" alt="Tawseel Logo" style="width: 50px;"></a>
        
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown user-menu">
                    <!-- Changed data-toggle to data-bs-toggle -->
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" 
                    data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?=base_url('loadimg/img/user.png')?>" class="user-image rounded-circle" alt="User Image">
                        <span class="d-none d-sm-inline"><?= session()->get('username') ?></span>
                    </a>
                    <!-- dropdown-menu-right is now dropdown-menu-end in BS5 -->
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:void(0)" class="dropdown-item" onclick="loadMe('<?= base_url('dashboard/users/profile/'.enc(session()->get('user_id'))) ?>')">
                            <i class="fa fa-user"></i> <?=lang('app.myprofile')?>
                        </a>
                        <a class="dropdown-item" href="<?= base_url('logout') ?>">
                            <i class="fa fa-sign-out"></i> <?=lang('app.logout')?>
                        </a>
                    </div>
                </li>
            </ul>
        </div>

    </nav>
</header>

<!-- Sidebar -->
<aside class="sidebar">
    <ul class="list-sidebar">
        <li> 
            <a href="<?=base_url('dashboard')?>" class="active"><i class="fa fa-th-large"></i> <span class="nav-label"><?=lang('app.dashboard')?></span></a>
        </li>
        <li> 
            <?php 
            if(getMy('type') == 'personal')
            {?>
                <li>
                <a href="javascript:void(0)" onclick="loadMe('<?= base_url('mybusiness/create') ?>')" ><i class="fas fa-tasks"></i> 
                    <span class="nav-label"><?=lang('app.start_business')?></span> 
                </a>
                </li>
            <?php
            }
            elseif(auth('businesses'))
            {?>
            <li>
                <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#business-menu" onclick="loadMe('<?= base_url('businesses/all') ?>')"><i class="fas fa-tasks"></i>
                    <span class="nav-label"><?=lang('app.activity')?></span> 
                    <span class="fa fa-chevron-left float-end"></span> 
                </a>
                <ul class="sub-menu collapse" id="business-menu">
                    <li>
                        <a href="javascript:void(0)" onclick="loadMe('<?= base_url('businesses/type/logistics') ?>')" data-bs-toggle="collapse" data-bs-target="#blogistics-menu"> 
                            <span class="fas fa-caret-right">
                            </span> <?=lang('app.logistics')?>
                        </a>
                        <ul class="sub-menu collapse" id="blogistics-menu">
                            <li>
                                <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#b1pl-menu" onclick="loadMe('<?= base_url('businesses/type/1pl') ?>');">
                                    <span class="fas fa-caret-right"></span>
                                    <span><?=lang('app.1pl')?></span>
                                </a>
                                <ul class="sub-menu collapse" id="b1pl-menu">
                                    <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('businesses/type/individual') ?>');"><span><?=lang('app.individual')?></span></a></li>
                                    <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('businesses/type/corporation') ?>');"><span><?=lang('app.corporation')?></span></a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('businesses/type/2pl') ?>');"><span><?=lang('app.2pl')?></span></a></li>
                            <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('businesses/type/34pl') ?>');"><span><?=lang('app.3_4pl')?></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" onclick="loadMe('<?= base_url('businesses/type/eCommerce') ?>')" data-bs-toggle="collapse" data-bs-target="#beCommerce-menu">
                            <span class="fas fa-caret-right"></span>
                            <?=lang('app.eCommerce')?>
                        </a>
                         <ul class="sub-menu collapse" id="beCommerce-menu">
                            <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('businesses/type/b2b') ?>');"><span><?=lang('app.b2b')?></span></a></li>
                            <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('businesses/type/b2c') ?>');"><span><?=lang('app.b2c')?></span></a></li>
                            <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('businesses/type/c2c') ?>');"><span><?=lang('app.c2c')?></span></a></li>
                        </ul>
                    </li>
                </ul>
                </li>
            <?php 
            }
            elseif(has_business())
            {?>
            <li>
            <a href="javascript:void(0)" onclick="loadMe('<?= base_url('mybusiness/view') ?>')"><i class="fas fa-tasks"></i> 
                <span class="nav-label"><?=lang('app.my_activity')?></span> 
            </a>
            </li>
            <?php
            }
            else
            {?>
            <li>
            <a href="<?php if(getMy('logistics_type') == 'individual'){echo base_url('business/individual/');}else{echo base_url('business/registration/');}?>"><i class="fas fa-tasks"></i> 
                <span class="nav-label"><?=lang('app.complete_activity')?> </span> 
            </a>
            </li>
            <?php
            }
            if(auth('store_admin') || auth('souq_admin') || auth('tawseel_admin')): ?>
         <li>
            <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#admin-menu"><i class="fas fa-key"></i> 
                <span class="nav-label"><?=lang('app.admin')?></span>
                <span class="fa fa-chevron-left float-end"></span> 
            </a>
            <ul class="sub-menu collapse" id="admin-menu">
                <?php if(auth('store_admin')): ?>
                    <li><a href="https://eqomos.tawseelonline.om/ECOM/nav/login" target="_blank"><span><?=lang('app.store')?></span></a></li>
                <?php endif;
                if(auth('souq_admin')): ?>
                    <li><a href="https://souqstaff.tawseelonline.om/ECOM/nav/login/" target="_blank"><span><?=lang('app.souq')?></span></a></li>
                <?php endif; 
                if(auth('tawseel_admin')):?>
                    <li><a href="https://7rights.tawseelonline.om/LCMS/login" target="_blank"><span><?=lang('app.tawseel')?></span></a></li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; 
        if(auth('admin')):?>
        <li>
            <a href="javascript:void(0)" onclick="loadMe('<?= base_url('dashboard/agreement/templates') ?>')">
                <i class="fas fa-file-contract"></i> 
                <span class="nav-label"><?=lang('app.agreement_templates')?></span>
            </a>
        </li>
        <?php endif?>

        <li>
            <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#briefcase-menu"><i class="fas fa-briefcase"></i> 
                <span class="nav-label"><?=lang('app.businesses')?></span>
                <span class="fa fa-chevron-left float-end"></span> 
            </a>
            <ul class="sub-menu collapse" id="briefcase-menu">
                <li><a href="https://store.tawseelonline.om/" target="_blank"><span><?=lang('app.store')?></span></a></li>
                <li><a href="https://souq.tawseelonline.om/" target="_blank"><span><?=lang('app.souq')?></span></a></li>
                <li><a href="https://c2c.tawseelonline.om/" target="_blank"><span><?=lang('app.tawseel')?></span></a></li>
            </ul>
        </li>

        <?php if(auth('tawseelonline') || auth('dmoain') || auth('host')): ?>
        <li>
            <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#cloud-menu">
                <i class="fas fa-cloud"></i> 
                <span class="nav-label"><?=lang('app.cloud')?></span>
                <span class="fa fa-chevron-left float-end"></span> 
            </a>
            <ul class="sub-menu collapse" id="cloud-menu">
                <?php if(auth('tawseelonline')): ?>
                    <li><a href="https://product.omandatapark.com/login" target="_blank"><span><?=lang('app.tawseelonline.om')?></span></a></li>
                <?php endif; 
                if(auth('dmoain')): ?>
                    <li><a href="https://sso.godaddy.com/?realm=idp&app=cart&path=%2Fcheckoutapi%2Fv1%2Fredirects%2Flogin" target="_blank"><span><?=lang('app.tawseels_doamin')?></span></a></li>
                <?php endif; 
                if(auth('host')): ?>
                    <li><a href="https://clients.x10premium.com/login" target="_blank"><span><?=lang('app.tawseels_host')?></span></a></li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        
        <?php
        if(auth('admin')): ?>
        <li>
            <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#home-content"> <i class="fa fa-home"></i> 
                <span class="nav-label"><?=lang('app.home')?></span> 
                <span class="fa fa-chevron-left float-end"></span> 
            </a>
            <ul class="sub-menu collapse" id="home-content">
                <li>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('siteinfo') ?>')"> 
                        <span class="nav-label"><?=lang('app.siteInfo')?></span> 
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('homeinfo') ?>')">
                        <span class="nav-label"><?=lang('app.homeinfo')?></span> 
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('keyhighlight') ?>')">
                        <span class="nav-label"><?=lang('app.key_highlight')?></span> 
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('HighLightItems') ?>')">
                        <span class="nav-label"><?=lang('app.key_highlight_Item')?></span> 
                    </a>
                </li>
            </ul>
        </li>   
        <li>
            <a  href="javascript:void(0)" onclick="loadMe('<?= base_url('menus') ?>')" >
                <i class="fa fa-list"></i> 
                <span class="nav-label"><?=lang('app.menu')?></span> 
            </a>
        </li>   
        
        <li>
            <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#partnership">
                <i class="fa fa-handshake"></i> 
                <span class="nav-label"><?=lang('app.partnership')?></span> 
                <span class="fa fa-chevron-left float-end"></span> 
            </a>
            <ul class="sub-menu collapse" id="partnership">
                <li>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('partnership') ?>')">
                        <span class="nav-label"><?=lang('app.partnership')?></span> 
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('partnershipitem') ?>')">
                        <span class="nav-label"><?=lang('app.partner')?></span> 
                    </a>
                </li>
               
            </ul>
        </li>
        <?php endif; ?>

        <?php if(auth('users')): ?>
        <li> 
            <a href="javascript:void(0)" onclick="loadMe('<?= base_url('dashboard/users') ?>');" data-bs-toggle="collapse" data-bs-target="#users-menu"><i class="fa fa-users"></i> 
                <span class="nav-label"><?=lang('app.users')?></span>
                <span class="fa fa-chevron-left float-end"></span> 
            </a>
            <ul class="sub-menu collapse" id="users-menu">
                <li>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('dashboard/users/list/logistics') ?>');" data-bs-toggle="collapse" data-bs-target="#logistics-menu">
                        <span class="fas fa-caret-right"></span>    
                        <span class="nav-label"><?=lang('app.logistics')?></span> 
                    </a>
                    <ul class="sub-menu collapse" id="logistics-menu">
                        <li>
                            <a href="javascript:void(0)" onclick="loadMe('<?= base_url('dashboard/users/list/1pl') ?>');" data-bs-toggle="collapse" data-bs-target="#1pl-menu">
                                <span class="fas fa-caret-right"></span>    
                                <span><?=lang('app.1pl')?></span>
                            </a>
                            <ul class="sub-menu collapse" id="1pl-menu">
                                <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('dashboard/users/list/individual') ?>');"><span><?=lang('app.individual')?></span></a></li>
                                <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('dashboard/users/list/corporation') ?>');"><span><?=lang('app.corporation')?></span></a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('dashboard/users/list/2pl') ?>');"><span><?=lang('app.2pl')?></span></a></li>
                        <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('dashboard/users/list/34pl') ?>');"><span><?=lang('app.3_4pl')?></span></a></li>
                        
                    </ul>

                </li>
                <li>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('dashboard/users/list/eCommerce') ?>');" data-bs-toggle="collapse" data-bs-target="#eCommerce-menu">
                        <span class="fas fa-caret-right"></span>        
                        <span class="nav-label"><?=lang('app.eCommerce')?></span>
                    </a>
                    <ul class="sub-menu collapse" id="eCommerce-menu">
                        <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('dashboard/users/list/b2b') ?>');"><span><?=lang('app.b2b')?></span></a></li>
                        <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('dashboard/users/list/b2c') ?>');"><span><?=lang('app.b2c')?></span></a></li>
                        <li><a href="javascript:void(0)" onclick="loadMe('<?= base_url('dashboard/users/list/c2c') ?>');"><span><?=lang('app.c2c')?></span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="loadMe('<?= base_url('dashboard/users/list/personal') ?>');"><span class="nav-label"><?=lang('app.personal')?></span></a>
                </li>
            </ul>
        </li>
        <?php endif;
        if(auth('mailbox')): ?>
            <li>
                <a href="https://webmail.tawseelonline.om" target="_blank">
                    <i class="fas fa-envelope"></i> 
                    <span class="nav-label"><?=lang('app.webmail')?></span>
            </a>
            </li>
        <?php endif;?>
    </ul>
</aside>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

<script src="<?= base_url('assets/js/adminScript.js') ?>"></script>

<!-- Main Content -->
<div class="main">
<!-- Main Content --> 
    <div id="content">
        <div class="card mb-4">
            <?php if(auth('admin') || auth('users')):?>
            <div class="card-header">
                <h4>Tawseel Online | Master Control Panel</h4>
            </div>
            <div class="container-fluid">
                <div class="card-body">
                    <div class="row">
                        <!-- Chart 3: Users by Registration Date -->
                        <div class="col-md-12">
                            <canvas id="registrationChart"></canvas>
                        </div>
                        <div class="col-md-7 mt-4">
                            <canvas id="userActivityChart"></canvas>
                        </div>
                        <div class="col-md-4 mt-4">
                            <canvas id="userTypeChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <?php else:?>
                <div class="card mb-4">
                <div class="card-header">
                    <h4>Quick Access</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Store Card -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <a href="https://store.tawseelonline.om/" target="_balnk">
                                <div class="card dashboard-card h-100">
                                    <div class="card-body">
                                        <i class="fas fa-shopping-bag"></i>
                                        <h4><?=lang('app.store')?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Souq Card -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <a href="https://souq.tawseelonline.om/" target="_balnk">
                                <div class="card dashboard-card h-100">
                                    <div class="card-body">
                                        <i class="fas fa-shopping-cart"></i>
                                        <h4><?=lang('app.souq')?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php if(auth('souq_admin')): ?>
                        <!-- Souq Admin Card -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <a href="https://souqstaff.tawseelonline.om/ECOM/nav/login" target="_balnk">
                                <div class="card dashboard-card h-100">
                                    <div class="card-body">
                                        <i class="fas fa-store-alt"></i>
                                        <h4><?=lang('app.souq_admin')?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>

                        <!-- Tawseel Card -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <a href="https://c2c.tawseelonline.om/" target="_balnk">
                                <div class="card dashboard-card h-100">
                                    <div class="card-body">
                                        <i class="fas fa-truck"></i>
                                        <h4><?=lang('app.tawseel')?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php if(auth('tawseel_admin')): ?>
                        <!-- Tawseel Admin Card -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <a href="https://7rights.tawseelonline.om/LCMS/login" target="_balnk">
                                <div class="card dashboard-card h-100">
                                    <div class="card-body">
                                        <i class="fas fa-truck-loading"></i>
                                        <h4><?=lang('app.tawseel_admin')?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>
            
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://www.jqueryscript.net/demo/Multi-Select-Plugin-jQuery-MagicSuggest/magicsuggest.js"></script>
<script src="<?=base_url('assets/js/myapp.js')?>"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Convert PHP arrays to JS
  const userTypes = <?= json_encode($users) ?>;
  const userActivities = <?= json_encode($users_sub) ?>;
  const monthlyRegistrations = <?= json_encode($users_reg) ?>;
  const totalUsers = <?= array_sum(array_column($users, 'count')) ?>;

  // Initialize charts when DOM is loaded
  document.addEventListener('DOMContentLoaded', function() {
    // 1. User Type Chart (Doughnut)
    new Chart(
      document.getElementById('userTypeChart'),
      {
        type: 'doughnut',
        data: {
          labels: userTypes.map(item => item.type.charAt(0).toUpperCase() + item.type.slice(1)),
          datasets: [{
            data: userTypes.map(item => item.count),
            backgroundColor: [
              '#FF6384', '#36A2EB', '#FFCE56'
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            title: {
              display: true,
              text: 'Users by Type'
            }
          }
        }
      }
    );

    // 2. User Activity Chart (Bar)
    new Chart(
      document.getElementById('userActivityChart'),
      {
        type: 'bar',
        data: {
        labels: userActivities.map(item => item.sub_type.toUpperCase()),
          datasets: [{
            label: 'Number of Users',
            data: userActivities.map(item => item.count),
            backgroundColor: '#4BC0C0',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            title: {
              display: true,
              text: 'Users by Activity Type'
            }
          },
          scales: {
            y: { beginAtZero: true }
          }
        }
      }
    );

    // 3. Monthly Registration Chart (Line)
    new Chart(
      document.getElementById('registrationChart'),
      {
        type: 'line',
        data: {
          labels: monthlyRegistrations.map(item => item.month),
          datasets: [{
            label: 'User Registrations ('+totalUsers+')',
            data: monthlyRegistrations.map(item => item.count),
            fill: true,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgb(35, 143, 225)',
            tension: 0.3,
            borderWidth: 2
          }]
        },
        options: {
          responsive: true,
          plugins: {
            title: {
              display: true,
              text: 'Monthly User Registrations'
            }
          },
          scales: {
            y: { beginAtZero: true }
          }
        }
      }
    );
  });
</script>

</body>
</html>
  