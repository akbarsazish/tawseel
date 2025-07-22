<?= $this->extend('chome') ?>
<?= $this->section('title') ?>
    <?= lang('app.title') ?>
<?= $this->endSection() ?>

<?= $this->section('header_title') ?>
  <?=lang('app.contact_title')?>
<?= $this->endSection() ?>

<?= $this->section('header_desc') ?>
  <?=lang('app.contact_description')?>
<?= $this->endSection() ?>  

<?= $this->section('content') ?>
<div id="contact" class="section w3-padding-64" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="section-header text-center">
      <h2 style="color: #229dd9;"><b><span><?=lang('app.contact_information')?></span></b></h2>
      <p class="w3-large" style="color: #6c757d;"><span><?=lang('app.contact_information_title')?></span></p>
    </div>
    
    <!-- Google Map Row - Enhanced -->
    <div class="row justify-content-center mb-5">
      <div class="col-lg-10">
        <div class="w3-card-4 w3-white w3-hover-shadow" data-aos="fade-up">
          <div class="w3-padding-16 text-center">
            <h3 class="mb-4" style="color: #229dd9; border-bottom: 2px solid #229dd9; display: inline-block; padding-bottom: 8px;">
              <i class="bi bi-geo-alt-fill"></i> <?=lang('app.our_location')?>
            </h3>
          </div>
          <div id="map2" class="embed-responsive embed-responsive-16by9 w3-round-large" style="border: 1px solid #e0e0e0; overflow: hidden;">
          </div>
        </div>
      </div>
    </div>
    
    <!-- Enhanced Contact Form Row -->
    <div class="row justify-content-center mb-5 w3-margin-top">
      <div class="col-lg-10">
        <div class="w3-card-4 w3-white w3-hover-shadow" data-aos="fade-up" style="border-top: 4px solid #eb6413;">
          <div class="w3-padding-32">
            <h3 class="text-center mb-4" style="color: #eb6413;">
              <i class="bi bi-envelope-paper-fill"></i> <?=lang('app.contact_us')?>
            </h3>
            <form class="w3-container" action="<?=base_url('contact/send')?>" method="post">
                  <?= csrf_field() ?>
              <div class="form-row">
                <div class="form-group col-md-6 mb-4">
                  <label for="fullName" class="w3-text-grey"><i class="bi bi-person-fill w3-margin-right"></i><?=lang('app.full_name')?></label>
                  <input type="text" class="form-control w3-input w3-border w3-round-large" id="fullName" name="fullName" placeholder="<?=lang('app.full_name_title')?>" style="padding: 12px;" required>
                </div>
                <div class="form-group col-md-6 mb-4">
                  <label for="email" class="w3-text-grey"><i class="bi bi-envelope-fill w3-margin-right"></i><?=lang('app.email')?></label>
                  <input type="email" class="form-control w3-input w3-border w3-round-large" id="email" name="email" placeholder="<?=lang('app.email_title')?>" style="padding: 12px;" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6 mb-4">
                  <label for="phone" class="w3-text-grey"><i class="bi bi-telephone-fill w3-margin-right"></i><?=lang('app.phone_name')?></label>
                  <input type="tel" class="form-control w3-input w3-border w3-round-large" id="phone" name="phone" placeholder="<?=lang('app.phone_title')?>" style="padding: 12px;" required>
                </div>
                <div class="form-group col-md-6 mb-4">
                  <label for="subject" class="w3-text-grey"><i class="bi bi-card-heading w3-margin-right"></i><?=lang('app.subject')?></label>
                  <select class="form-control w3-input w3-border w3-round-large" id="subject" name="subject" style="padding: 12px; height: 46px;" required>
                    <option value="E-Commerce">E-Commerce</option>
                    <option value="Logistics">Logistics</option>
                    <option value="Store">Store</option>
                    <option value="Souq">Souq</option>
                    <option value="Tawseel">Tawseel</option>
                    <option value="Devices">Devices</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>
              <div class="form-group mb-4">
                <label for="description" class="w3-text-grey"><i class="bi bi-chat-left-text-fill w3-margin-right"></i><?=lang('app.description')?></label>
                <textarea class="form-control w3-input w3-border w3-round-large" id="description" name="description" rows="5" placeholder="<?=lang('app.description_title')?>" style="padding: 12px;" required></textarea>
              </div>
              <div class="text-center mt-4">
                <button type="submit" class="w3-button w3-round-large w3-padding-large" style="background-color: #eb6413; color: white; width: 200px;">
                  <i class="bi bi-send-fill w3-margin-right"></i><?=lang('app.submit')?>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Contact Info Cards Row -->
    <div class="row justify-content-center mt-5">
      <div class="col-lg-10">
        <div class="row">
          <!-- Address Card -->
          <div class="col-md-6 mb-4 aos-init aos-animate" data-aos="fade-right">
            <div class="w3-card-4 w3-white w3-padding-32 w3-hover-shadow h-100" style="border-top: 4px solid #229dd9;">
              <div class="text-center">
                <i class="bi bi-building" style="font-size: 3rem; color: #229dd9; margin-bottom: 1rem;"></i>
                <h4 style="color: #343a40;"><b><?=lang('app.our_headquarters')?></b></h4>
                <div class="w3-padding-16">
                  <p style="color: #6c757d;">
                    <i class="bi bi-geo-alt-fill" style="color: #229dd9;"></i> 
                    <?=lang('app.address_desc')?>
                  </p>
                </div>
                <a href="https://www.google.com/maps/place/23%C2%B031'26.1%22N+58%C2%B030'10.4%22E/@23.5239106,58.5003093,17z/data=!3m1!4b1!4m4!3m3!8m2!3d23.5239106!4d58.5028842?entry=ttu&g_ep=EgoyMDI1MDUxMy4xIKXMDSoASAFQAw%3D%3D" target="_blank" class="w3-button w3-round" style="background-color: #229dd9; color: white;">
                  <i class="bi bi-map"></i> <?=lang('app.view_on_map')?>
                </a>
              </div>
            </div>
          </div>
          
          <!-- Contact Card -->
          <div class="col-md-6 mb-4 aos-init aos-animate" data-aos="fade-left">
            <div class="w3-card-4 w3-white w3-padding-32 w3-hover-shadow h-100" style="border-top: 4px solid #eb6413;">
              <div class="text-center">
                <i class="bi bi-headset" style="font-size: 3rem; color: #eb6413; margin-bottom: 1rem;"></i>
                <h4 style="color: #343a40;"><b><?=lang('app.contact_title3')?></b></h4>
                <div class="w3-padding-16">
                  <p style="color: #6c757d;">
                    <i class="bi bi-telephone-fill" style="color: #eb6413;"></i> <a href="tel:<?=lang('app.phone')?>" style="color: #229dd9;"><?=lang('app.phone_view')?></a><br><br>
                    <i class="bi bi-envelope-fill" style="color: #eb6413;"></i> <a href="mailto:<?=lang('app.info_email')?>" style="color: #229dd9;"><?=lang('app.info_email')?></a>
                  </p>
                </div>
                <div class="w3-padding-16">
                  <h5 style="color: #343a40;"><b><?=lang('app.business_hours')?></b></h5>
                  <p style="color: #6c757d;">
                    <i class="bi bi-clock-fill" style="color: #eb6413;"></i><?=lang('app.business_days')?><br>
                    <i class="bi bi-clock" style="color: #eb6413;"></i> <?=lang('app.nobusiness_days')?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Social Media Section -->
    <div class="row mt-5">
      <div class="col-12 text-center">
        <h4 style="color: #343a40; margin-bottom: 1.5rem;"><b><?=lang('app.contact_title4')?></b></h4>
        <div class="footer-social-icon">
          <a href="https://www.facebook.com/tawseelsocial" target="_blank" class="w3-text-blue"><i class="bi bi-facebook w3-xxlarge w3-padding"></i></a>
          <a href="https://www.instagram.com/tawseel_online" target="_blank" class="w3-text-blue"><i class="bi bi-instagram w3-xxlarge w3-padding"></i></a>
          <a href="https://x.com/tawseelonline" target="_blank" class="w3-text-blue"><i class="bi bi-twitter w3-xxlarge w3-padding"></i></a>
          <a href="https://www.youtube.com/@tawseelonline" target="_blank" class="w3-text-blue"><i class="bi bi-youtube w3-xxlarge w3-padding"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
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
              <select id="province" name="province" class="form-control" onchange="$.get('<?= base_url('getcity/') ?>/' + $(this).val(), function(data) {$('#city').html(data);});" required>
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
              <?php foreach(lang('app.muscat') as $key => $value) 
                {?>
                  <option value="<?=$key?>"><?=$value?></option>
                <?php
                }?>
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
    // Global variables for main map
    let map;
    let marker;
    let geocoder;
    let autocomplete;
    let isLocationSelected = false;
    
    // Initialize both maps
    function initMap() 
    {
        // Initialize main interactive map
        initMainMap();
        
        // Initialize Dubai map
        initContactMap();
    }
    
    function initMainMap() {
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
    
    function initContactMap() {
        // Coordinates for Map2
        var tawseellocation = { lat: 23.5238881, lng: 58.5028724 };
        
        // Create Map2
        var map2 = new google.maps.Map(document.getElementById('map2'), {
            zoom: 18,
            center: tawseellocation,
            mapTypeControl: true,
            streetViewControl: false
        });
        
        // Add marker with custom icon
        var marker2 = new google.maps.Marker({
            position: tawseellocation,
            map: map2,
            title: 'Tawseel E-Commerce & Logistics location',
            icon: {
                url: "https://tawseelonline.om/loadimg/img/logo.png",
                scaledSize: new google.maps.Size(40, 40)
            }
        });
        
        // Add info window
        var infowindow2 = new google.maps.InfoWindow({
            content: '<div style="padding:10px;"><strong>Tawseel E-Commerce & Logistics</strong><br>location</div>'
        });
        
        // Open info window automatically
        infowindow2.open(map2, marker2);
        
        // Open on marker click
        marker2.addListener('click', function() {
            infowindow2.open(map2, marker2);
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

<?= $this->endSection() ?>