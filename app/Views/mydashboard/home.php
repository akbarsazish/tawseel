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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8f755494e9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?=base_url('loadimg/img/user.png')?>" class="user-image rounded-circle" alt="User Image">
                        <span class="hidden-xs"><?= session()->get('username') ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        
                        <a href="javascript:void(0)" class="dropdown-item" onclick="loadMe('<?= base_url('mydashboard/myprofile') ?>')"><i class="fa fa-user"></i> <?=lang('app.myprofile')?></a>
                        <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="fa fa-sign-out"></i> <?=lang('app.logout')?></a>
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
            <a href="<?=base_url('mydashboard')?>" class="active"><i class="fa fa-th-large"></i> <span class="nav-label"><?=lang('app.dashboard')?></span></a>
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
                <a href="javascript:void(0)" data-toggle="collapse" data-target="#business-menu" onclick="loadMe('<?= base_url('businesses/all') ?>')"><i class="fas fa-tasks"></i>
                    <span class="nav-label"><?=lang('app.activity')?></span> 
                    <span class="fa fa-chevron-left pull-right"></span> 
                </a>
                <ul class="sub-menu collapse" id="business-menu">
                    <li>
                        <a href="javascript:void(0)" onclick="loadMe('<?= base_url('businesses/type/logistics') ?>')" data-toggle="collapse" data-target="#blogistics-menu"> 
                            <span class="fas fa-caret-right">
                            </span> <?=lang('app.logistics')?>
                        </a>
                        <ul class="sub-menu collapse" id="blogistics-menu">
                            <li>
                                <a href="javascript:void(0)" data-toggle="collapse" data-target="#b1pl-menu" onclick="loadMe('<?= base_url('businesses/type/1pl') ?>');">
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
                        <a href="javascript:void(0)" onclick="loadMe('<?= base_url('businesses/type/eCommerce') ?>')" data-toggle="collapse" data-target="#beCommerce-menu">
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
            <a href="javascript:void(0)" onclick="loadMe('<?= base_url('mydashboard/mybusiness/view') ?>')"><i class="fas fa-tasks"></i> 
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
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#admin-menu"><i class="fas fa-key"></i> 
                <span class="nav-label"><?=lang('app.admin')?></span>
                <span class="fa fa-chevron-left pull-right"></span> 
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
        <?php endif; ?>

        <li>
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#briefcase-menu"><i class="fas fa-briefcase"></i> 
                <span class="nav-label"><?=lang('app.businesses')?></span>
                <span class="fa fa-chevron-left pull-right"></span> 
            </a>
            <ul class="sub-menu collapse" id="briefcase-menu">
                <li><a href="https://store.tawseelonline.om/" target="_blank"><span><?=lang('app.store')?></span></a></li>
                <li><a href="https://souq.tawseelonline.om/" target="_blank"><span><?=lang('app.souq')?></span></a></li>
                <li><a href="https://c2c.tawseelonline.om/" target="_blank"><span><?=lang('app.tawseel')?></span></a></li>
            </ul>
        </li>

        <?php if(auth('tawseelonline') || auth('dmoain') || auth('host')): ?>
        <li>
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#cloud-menu">
                <i class="fas fa-cloud"></i> 
                <span class="nav-label"><?=lang('app.cloud')?></span>
                <span class="fa fa-chevron-left pull-right"></span> 
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
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#home-content"> <i class="fa fa-home"></i> 
                <span class="nav-label"><?=lang('app.home')?></span> 
                <span class="fa fa-chevron-left pull-right"></span> 
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
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#partnership">
                <i class="fa fa-handshake"></i> 
                <span class="nav-label"><?=lang('app.partnership')?></span> 
                <span class="fa fa-chevron-left pull-right"></span> 
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
    </ul>
</aside>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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

<script src="<?=base_url('assets/js/myapp.js')?>"></script>

</body>
</html>
  