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
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="<?=base_url('assets/css/swiper-bundle.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="<?=base_url('assets/css/ostyles.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/styles.css')?>" rel="stylesheet">
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/c529debf55.js" crossorigin="anonymous"></script>
    </head>
  <body>

  <header id="header" class="header d-flex align-items-center sticked">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="<?=base_url()?>" class="logo d-flex align-items-center w3-margin-left" onclick="loadding()">
        <img src="<?=base_url('loadimg/img/logo.png')?>" alt="Tawseel Logo">
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li onclick="loadding();"><a href="<?=base_url()?>"> <?=lang('app.home')?> </a></li>
         
          <li class="dropdown"><a href="javascript:void(0)" class=""><span><?=lang('app.activity')?></span> <i class="bi dropdown-indicator bi-chevron-down"></i></a>
            <ul>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="<?=base_url('eCommerce')?>"><?=lang('app.eCommerce')?></a></li>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="<?=base_url('logistics')?>"><?=lang('app.logistics')?></a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="javascript:void(0)" class=""><span><?=lang('app.business')?></span> <i class="bi dropdown-indicator bi-chevron-down"></i></a>
            <ul class="">
            <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="https://store.tawseelonline.om"><?=lang('app.store')?></a></li>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="https://souq.tawseelonline.om"><?=lang('app.souq')?></a></li>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="https://c2c.tawseelonline.om"><?=lang('app.tawseel')?></a></li>
            </ul>
          </li>
          <li>
    <a 
        <?php 
        if (!session()->get('logged_in')) 
        {
            echo "href=".base_url('login')." onclick='loadding();'";
        } 
        elseif(is_location())
        {
            echo "href='https://product.tawseelonline.om/home/" . 
                 enc(session()->get('user_id') ?? '') . "/'". " onclick='loadding()'";
        }
        else
        {
            echo "href='#' data-toggle='modal' data-target='#locationModal' ";
        } 
        ?> 
        >
        <?= lang('app.device') ?>
    </a>
</li>

          <li><a href="<?=base_url('partnership/allartners')?>" onclick="loadding();"><?=lang('app.partnership')?></a></li>
          <li><a href="javascript:void(0)" onclick="alert('Under Development...')"><?=lang('app.blogs')?></a></li>
          <li><a href="<?=base_url('contact')?>" onclick="loadding();"><?=lang('app.contact')?></a></li>
          <li><a href="<?=base_url('about')?>" onclick="loadding();"><?=lang('app.about')?></a></li>

          <?php
          if(login())
          {?>
            <li class="dropdown"><a href="javascript:void(0)" class=""><i class="fas fa-user-circle	w3-xlarge"></i> <i class="bi dropdown-indicator bi-chevron-down"></i></a>
            <ul>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="<?php if(auth('login')){echo base_url('dashboard');}else{echo base_url('mydashboard');}?>"><?=lang('app.dashboard')?></a></li>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="<?=base_url('change/password')?>"><?=lang('app.change_password')?></a></li>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="<?=base_url('logout')?>"><?=lang('app.logout')?></a></li>
            </ul>
          </li>
          <?php
          }
          else
          {?>
            <li><a href="<?=base_url('login')?>" onclick="loadding()" class=""><?=lang('app.login2')?></a></li>
          <?php
          }?>

        </ul>
      </nav>
      
      <a href="tel:<?=lang('app.phone')?>" class="bi bi-telephone-inbound-fill w3-large w3-hover-text-blue"> </a>
      <a href="https://wa.me/<?=lang('app.phone')?>" class="bi bi-whatsapp w3-large w3-hover-text-green"> </a>
    
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      
    </div>
  </header>
  
  <?php if (session()->getFlashdata('success') || session()->getFlashdata('errors') || session()->getFlashdata('error')): ?>
  <div id="alert-container" class="w3-container" style="margin: 0 auto 20px; max-width: 1200px;">
    <?php if (session()->getFlashdata('success')): ?>
      <div class="w3-panel w3-pale-green w3-card w3-round-large" style="position: relative; margin-bottom: 15px; border-left: 4px solid #4CAF50;">
        <span onclick="this.parentElement.style.display='none'" 
              class="w3-button w3-display-topright w3-hover-none w3-text-green" 
              style="padding: 8px 12px; top: 2px; right: 2px;">&times;</span>
        <div style="padding: 12px 30px 12px 20px; display: flex; align-items: center; gap: 12px;">
          <i class="fas fa-check-circle w3-text-green" style="font-size: 1.5em;"></i>
          <div>
            <h4 style="margin: 0 0 4px 0; font-weight: 500;">Success!</h4>
            <p style="margin: 0;"><?= esc(session()->getFlashdata('success')) ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
      <div class="w3-panel w3-pale-red w3-card w3-round-large" style="position: relative; margin-bottom: 15px; border-left: 4px solid #f44336;">
        <span onclick="this.parentElement.style.display='none'" 
              class="w3-button w3-display-topright w3-hover-none w3-text-red" 
              style="padding: 8px 12px; top: 2px; right: 2px;">&times;</span>
        <div style="padding: 12px 30px 12px 20px;">
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
      <div class="w3-panel w3-pale-red w3-card w3-round-large" style="position: relative; margin-bottom: 15px; border-left: 4px solid #f44336;">
        <span onclick="this.parentElement.style.display='none'" 
              class="w3-button w3-display-topright w3-hover-none w3-text-red" 
              style="padding: 8px 12px; top: 2px; right: 2px;">&times;</span>
        <div style="padding: 12px 30px 12px 20px; display: flex; align-items: center; gap: 12px;">
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

<section id="hero" class="hero sticked-header-offset">
<div id="particles-js"><canvas class="particles-js-canvas-el" width="1425" height="754" style="width: 100%; height: 100%;"></canvas></div>
    <div id="repulse-circle-div"></div>
    <div class="container position-relative">
      <div class="row gy-5 aos-init aos-animate">
        <div class="col-lg-7 offset-lg-5 dark-bg order-lg-1 d-flex flex-column justify-content-start text-left caption">
          <h2 data-aos="fade-up" class="aos-init aos-animate"><?= $this->renderSection('header_title') ?></h2>
          <p data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate w3-large"><?= $this->renderSection('header_desc') ?></p>
          <div class="social aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
            <a href="https://www.facebook.com/tawseelsocial" target="blank"><i class="bi bi-facebook"></i></a>&nbsp;&nbsp;
            <a href="https://www.instagram.com/tawseel_online?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="blank"><i class="bi bi-instagram"></i></a>&nbsp;&nbsp;
            <a href="https://x.com/tawseelonline" target="blank"><i class="bi bi-twitter"></i></a>&nbsp;&nbsp;
            <a href="https://www.youtube.com/@tawseelonline" target="blank"><i class="bi bi-youtube"></i></a>&nbsp;&nbsp;
            <a href="mailto:info@tawseelonline.om" target="blank"><i class="bi bi-envelope"></i></a>&nbsp;&nbsp;
          </div>
        </div>
      </div>
    </div>
</section>

    <?= $this->renderSection('content') ?>

    <section class="text-center u-content-space pb-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" style="padding:0px; margin:0px;">
            <img class="img-fluid mx-auto" src="<?=base_url('assets/img-temp/img2.png')?>" alt="Iamge Description">
          </section>

<!-- Footer -->
 <footer id="footer" class="footer-section">
    <div class="container">
        <div class="footer-content pt-5 w3-margin-left aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-xl-3 col-lg-3 mb-16">
                    <div class="footer-widget">
                      
                        <div class="footer-social-icon">
                          <span><?=lang('app.contact_title')?></span>
                          <a href="<?= $siteInfo['facebook'] ?? '' ?>" target="_bank"> <i class="fa fa-facebook"></i> </a>
                          <a href="<?= $siteInfo['instagram'] ?? '' ?>" target="_bank"> <i class="fa fa-instagram"></i> </a>
                          <a href="<?= $siteInfo['twitter'] ?? '' ?>" target="_bank"> <i class="fa fa-twitter"></i> </a>
                          <a href="<?= $siteInfo['youtube'] ?? '' ?>" target="_bank"> <i class="fa fa-youtube"></i> </a>
                          <a href="<?= $siteInfo['email'] ?? '' ?>" target="_bank"> <i class="fa fa-envelope"></i> </a>            
                          <a href="tel:<?= $siteInfo['phone'] ?? '' ?>" target="_bank" class="d-block"> <i class="fa fa-phone"> </i> <?= $siteInfo['phone'] ?? '' ?> </a>
                        </div>
                         <div class="footer-widget-heading mt-4">
                          <h3><?=lang('app.legal_information')?></h3>
                        </div>
                        <div class="footer-text">
                              <a href="<?=base_url('terms-conditions')?>" class="w3-text-white"><?=lang('app.terms_conditions')?></a>
                              <br>
                              <a href="<?=base_url('privacy-policy')?>" class="w3-text-white"><?=lang('app.privacy_policy')?></a>
                              <br>
                              <a href="<?=base_url('refund-cancellation')?>" class="w3-text-white"><?=lang('app.refund_policy')?></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                      <div class="service-widget footer-widget">
                        <div class="footer-widget-heading">
                          <h3><?=lang('app.services')?></h3>
                          <div class="footer-text">
                               <p> <a href="<?=base_url('signup/eCommerce/b2b')?>" class="text-white">
                                  <?=lang('app.b2b')?><br>
                                 </a>
                              </p>
                               <p> <a href="<?=base_url('signup/eCommerce/b2c')?>" class="text-white">
                                  <?=lang('app.b2b')?><br>
                                 </a>
                              </p>
                               <p> <a href="<?=base_url('signup/eCommerce/c2c')?>" class="text-white">
                                  <?=lang('app.b2b')?><br>
                                 </a>
                              </p>
                               <p> <a href="<?=base_url('signup/eCommerce/b2b2c')?>" class="text-white">
                                  <?=lang('app.b2b')?><br>
                                 </a>
                              </p>
                          </div>
							          </div>
                      </div>
                </div>

            <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
             <div class="service-widget footer-widget">
                <div class="footer-widget-heading">
                    <h3><?=lang('app.links')?></h3>
                   
                </div>
                <ul>
                  <a href="<?=base_url('eCommerce')?>" class="w3-text-white"><?=lang('app.eCommerce')?></a>
                  <br>
                  <a href="<?=base_url('logistics')?>" class="w3-text-white"><?=lang('app.logistics')?></a>
                  <br>
                  <a href="https://store.tawseelonline.om" class="w3-text-white"><?=lang('app.store')?></a>
                  <br>
                  <a href="https://souq.tawseelonline.om" class="w3-text-white"><?=lang('app.souq')?></a>
                  <br>
                  <a href="https://c2c.tawseelonline.om" class="w3-text-white"><?=lang('app.tawseel')?></a>
                  <br>
                <a class="w3-text-white" 
                <?php  if (!session()->get('logged_in')) {
                    echo "href=".base_url('login')." onclick='loadding();'";
                } 
                elseif(is_location()) {
                    echo "href='https://product.tawseelonline.om/home/" . 
                    enc(session()->get('user_id') ?? '') . "/" . "onclick='loadding()'";
                }  else {
                    echo "href='#' data-toggle='modal' data-target='#locationModal' ";
                }  ?> 
                > <?= lang('app.device') ?>
              </a>
            </ul>
             
          </div>
       </div>
          <div class="col-xl-3 col-lg-3 col-md-6 mb-50">
               <div class="footer-widget">
                    <div class="footer-widget-heading">
                        <h3><?=lang('app.download_our_app')?></h3>
                      </div>
                        <div class="footer-text mb-25">
                            <p>
                              <?=lang('app.download_our_app_title')?>
                              <div class="app-buttons">
                                <a href="https://apps.apple.com/om/app/tawseelonline/id1511664020" target="_blank">
                                    <img src="https://store.tawseelonline.om/assets/custom/img/images/app_store.png" width="125px" alt="Download on the App Store">
                                </a>
                                <a href="https://play.google.com/store/apps/details?id=com.catseye.tawseel" target="_blank">
                                    <img src="https://store.tawseelonline.om/assets/custom/img/images/play_store.png" width="120px" alt="Get it on Google Play">
                                </a>
                            </div>
                          </p>
                        </div>
                        <div class="my-4">
                               <div class="footer-widget-heading">
                                    <h3><?=lang('app.secure_payment')?></h3>
                               </div>
                          <img style="width:80%" src="<?=base_url('loadimg/img/master_card_visa_cards.png')?>" alt="Tawseel Logo">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row border-top border-gray">
                <div class="text-center mx-auto">
                    <div class="copyright-text">
                        <p><?=lang('app.copyright')?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </footer>
  
  <div id="target" class="w3-modal" style="z-index:1000"></div>
  <!-- End Footer -->
  <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/js/glightbox.min.js')?>"></script>
  <script src="<?=base_url('assets/js/swiper-bundle.min.js')?>"></script>
  <script src="<?=base_url('assets/js/purecounter_vanilla.js')?>"></script>
  <script src="<?=base_url('assets/js/validator.min.js')?>"></script>
  <script src="<?=base_url('assets/js/particles.min.js')?>"></script>
  <script src="<?=base_url('assets/js/script.js')?>"></script>
  <script src="<?=base_url('assets/js/main.js')?>"></script>
  <script src="https://cdn.rawgit.com/michalsnik/aos/2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // Animation duration
        });
    </script>

  <script>
    $('#target').html("<div class='w3-display-middle loader-wrapper'><div class='loader'><div class='circle-one'></div><div class='circle-two'></div></div></div>").show();

    document.addEventListener("DOMContentLoaded", function() 
    {
        window.onload = function() 
        {
            $('#target').hide();
        };
    });

    function loadding()
    {
      $('#target').html("<div class='w3-display-middle loader-wrapper'><div class='loader'><div class='circle-one'></div><div class='circle-two'></div></div></div>").show();
    }
    </script>

<script>
document.addEventListener('DOMContentLoaded', function() 
{
    const loadingModal = document.getElementById('target');
    const minDisplayTime = 2000; // 2 seconds minimum display time
    let pageLoadStart = Date.now();
    
    // Always hide modal first in case it was persisted
    loadingModal.style.display = 'none';
    
    // Show modal when page starts loading
    loadingModal.style.display = 'block';
    pageLoadStart = Date.now();
    
    // Calculate remaining time to meet minimum display duration
    function hideModal() {
        const elapsed = Date.now() - pageLoadStart;
        const remaining = Math.max(0, minDisplayTime - elapsed);
        
        setTimeout(function() {
            loadingModal.style.display = 'none';
        }, remaining);
    }
    
    // Hide modal when page is loaded (with minimum display time)
    window.addEventListener('load', hideModal);
    
    // Special handling for back/forward navigation
    window.addEventListener('pageshow', function(event) 
    {
        if (event.persisted) 
        {
            loadingModal.style.display = 'none';
        } 
        else 
        {
            // For fresh loads via back/forward, show for minimum time
            loadingModal.style.display = 'block';
            pageLoadStart = Date.now();
            setTimeout(hideModal, minDisplayTime);
        }
    });
    
    // Error handling
    window.addEventListener('error', hideModal);
});
</script>
<!-- Modal -->
<div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="locationModalLabel"><?=lang('app.address_title')?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form method="post" action="<?=base_url('user/updateLocation')?>">
              <?= csrf_field() ?>

          <div class="row mb-3">
            
<div class="col-md-4">
              <label for="province" class="form-label"><?=lang('app.province_state')?></label>
              <select id="province" name="province" class="form-control" onchange="$.post('<?= base_url('getcity/') ?>/', { name: $(this).val() }, function(data) {$('#city').html(data);});" required>
                <?php foreach(lang('app.provinces') as $key => $value) 
                {?>
                  <option value="<?=$key?>"><?=$value?></option>
                <?php
                }?>
              </select>
            </div>

            <div class="col-md-4">
              <label for="city" class="form-label"><?=lang('app.city')?></label>
                <select id="city" name="city" class="form-control" required>
                    <?php foreach (lang('app.muscat') as $key => $value) { ?>
                        <option value="<?= $key ?>"><?= $value ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="col-md-4">
              <label for="way" class="form-label"><?=lang('app.way_street')?></label>
              <input type="text" id="way" name="way" class="form-control" placeholder="Street name" required>
            </div>            
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="address_line_1" class="form-label"><?=lang('app.address_line1')?></label>
              <input type="text" id="address_line_1" name="address_line_1" class="form-control" placeholder="Street address, P.O. box" required>
            </div>
            <div class="col-md-6">
              <label for="address_line_2" class="form-label"><?=lang('app.address_line2')?></label>
              <input type="text" id="address_line_2" name="address_line_2" class="form-control" placeholder="Apartment, suite, unit, building, floor, etc.">
            </div>
          </div>

          <label for="location" class="form-label"><?=lang('app.location')?></label>
          <div class="input-group mb-2">
            <input type="text" id="location" name="location" class="form-control" placeholder="Type your address or click the locate button" aria-label="Location address" required>
            <button class="btn btn-outline-secondary" type="button" id="locate-btn"><i class="fas fa-map-marker-alt"></i> <span> </span></button>
          </div>

          <div class="map-container">
            <div id="map"></div>
          </div>
          
          <input type="hidden" name="latitude" id="latitude">
          <input type="hidden" name="longitude" id="longitude">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=lang('app.cancel')?></button>
        <button type="submit" class="btn btn-primary" id="saveLocation"><?=lang('app.save')?></button>
      </div>
    </div>
    </form>
  </div>
</div>

<script>
    // Global variables
    let map;
    let marker;
    let geocoder;
    let autocomplete;
    let isLocationSelected = false;
    
    // Initialize the map
    function initMap() {
        // Initialize map with better default options
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 23.5880, lng: 58.3829 }, // Default to Muscat coordinates
            zoom: 10,
            streetViewControl: false,
            mapTypeControl: true,
            fullscreenControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                mapTypeIds: ["roadmap", "satellite"]
            }
        });
        
        geocoder = new google.maps.Geocoder();
        
        // Initialize autocomplete with more options
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById("location"),
            { 
                types: ["geocode", "establishment"],
                fields: ["geometry", "formatted_address", "name"],
                componentRestrictions: { country: "OM" } // Restrict to Oman
            }
        );
        
        // Fix for autocomplete in modal
        autocomplete.bindTo('bounds', map);
        
        // Prevent form submission when pressing Enter in the address field
        document.getElementById("location").addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                e.preventDefault();
            }
        });
        
        // Add marker with custom icon (optional)
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            title: "Drag to adjust your location",
        });
        
        // Event listeners
        autocomplete.addListener("place_changed", onPlaceChanged);
        marker.addListener("dragend", onMarkerDragEnd);
        map.addListener("click", onMapClick);
        
        document.getElementById("locate-btn").addEventListener("click", locateUser);
        
        // Additional fix for dropdown visibility
        $('#locationModal').on('shown.bs.modal', function() {
            google.maps.event.trigger(autocomplete, 'resize');
        });
    }
    
    // Handle place selection from autocomplete
    function onPlaceChanged() {
        const place = autocomplete.getPlace();
        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            return;
        }
        updateMapLocation(place.geometry.location);
        updatePositionFields(place.geometry.location);
        isLocationSelected = true;
    }
    
    function onMarkerDragEnd(event) {
        updatePositionFields(event.latLng);
        updateAddressFromPosition(event.latLng);
        isLocationSelected = true;
    }
    
    // Handle map click
    function onMapClick(event) {
        marker.setPosition(event.latLng);
        updatePositionFields(event.latLng);
        updateAddressFromPosition(event.latLng);
        isLocationSelected = true;
    }
    
    // Update map center and marker position
    function updateMapLocation(position) {
        map.setCenter(position);
        map.setZoom(15);
        marker.setPosition(position);
    }
    
    // Update hidden latitude/longitude fields
    function updatePositionFields(position) {
        document.getElementById("latitude").value = position.lat();
        document.getElementById("longitude").value = position.lng();
    }
    
    // Reverse geocode to get address from coordinates
    function updateAddressFromPosition(position) {
        geocoder.geocode({ location: position }, (results, status) => {
            if (status === "OK" && results[0]) {
                document.getElementById("location").value = results[0].formatted_address;   
            }
        });
    }
    
    // Locate user using browser geolocation
    function locateUser() {   
        if (!navigator.geolocation) {
            alert("Geolocation is not supported by this browser.");
            return;
        }

        navigator.geolocation.getCurrentPosition(
        (position) => {
            const userLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            // Update latitude/longitude form fields
            document.getElementById("latitude").value = position.coords.latitude;
            document.getElementById("longitude").value = position.coords.longitude;

            // Reverse geocode to get address
            geocoder.geocode({ location: userLocation }, (results, status) => {
                if (status === "OK" && results[0]) {
                    document.getElementById("location").value = results[0].formatted_address;
                }
            });
            
            // Update map with the new location
            updateMapLocation(userLocation);
        },
        (error) => {
            alert("Error getting location: " + error.message);
        }
    );
    }
</script>

  <?=google_maps_script()?>
</body>
</html>