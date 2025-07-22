<div class="card mb-4">
    <div class="card-header">
        <h2 class="h4 mb-0"><?= lang('app.myprofile_edit') ?></h2>
    </div>
    <div class="card-body">
        <form id="myForm" data-url="<?= base_url('dashboard/myprofile/update') ?>">
            <?= csrf_field() ?>
        
           <div class="row mb-3">
                <div class="col-md-4">
                    <label for="fullname" class="form-label"><?= lang('app.fullname') ?></label>
                    <input type="text" class="form-control" id="fullname" name="fullname" required placeholder="<?= lang('app.fullname') ?>" value="<?= esc($record['fullname']) ?>">
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label"><?= lang('app.email') ?></label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="<?= lang('app.email_title') ?>" value="<?= esc($record['email']) ?>">
                </div>
                <div class="col-md-4">
                    <label for="phone" class="form-label"><?= lang('app.phone_name') ?></label>
                    <input type="text" class="form-control" id="phone" name="phone" required placeholder="<?= lang('app.phone_title') ?>" value="<?= esc($record['phone']) ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8);">
                </div>
            </div>

            <?php if(getMy('type') != 'personal'): ?>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="cr" class="form-label"><?= lang('app.cr') ?></label>
                    <input type="text" class="form-control" id="cr" name="cr" required placeholder="<?= lang('app.cr_title') ?>" value="<?= esc($record['cr']) ?>" disabled>
                </div>
                <div class="col-md-3">
                    <label for="type" class="form-label"><?= lang('app.type') ?></label>
                    <select name="type" id="type" class="form-control" disabled>
                        <option value="eCommerce" <?= $record['type'] == 'eCommerce' ? 'selected' : '' ?>><?= lang('app.eCommerce') ?></option>
                        <option value="logistics" <?= $record['type'] == 'logistics' ? 'selected' : '' ?>><?= lang('app.logistics') ?></option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="sub_type" class="form-label"><?= lang('app.sub_type') ?></label>
                    <select name="sub_type" id="sub_type" class="form-control" disabled>
                        <?php if ($record['type'] == 'eCommerce'): ?>
                            <option value="b2b" <?= $record['sub_type'] == 'b2b' ? 'selected' : '' ?>><?= lang('app.b2b') ?></option>
                            <option value="b2c" <?= $record['sub_type'] == 'b2c' ? 'selected' : '' ?>><?= lang('app.b2c') ?></option>
                            <option value="c2c" <?= $record['sub_type'] == 'c2c' ? 'selected' : '' ?>><?= lang('app.c2c') ?></option>
                        <?php else: ?>
                            <option value="1pl" <?= $record['sub_type'] == '1pl' ? 'selected' : '' ?>><?= lang('app.1pl') ?></option>
                            <option value="2pl" <?= $record['sub_type'] == '2pl' ? 'selected' : '' ?>><?= lang('app.2pl') ?></option>
                            <option value="3pl" <?= $record['sub_type'] == '3pl' ? 'selected' : '' ?>><?= lang('app.3pl') ?></option>
                            <option value="4pl" <?= $record['sub_type'] == '4pl' ? 'selected' : '' ?>><?= lang('app.4pl') ?></option>
                        <?php endif; ?>
                    </select>
                </div>
        <?php endif; ?>

        <?php if($record['sub_type'] == '1pl'):?>
        <div class="col-md-3">
            <label for="logistics_type" class="form-label"><?= lang('app.logistics_type') ?></label>
            <select name="logistics_type" id="logistics_type" class="form-control" disabled="disabled">
                <option value="corporation" <?= $record['logistics_type'] == 'corporation' ? 'selected' : '' ?>><?= lang('app.corporation') ?></option>
                <option value="individual" <?= $record['logistics_type'] == 'individual' ? 'selected' : '' ?>><?= lang('app.individual') ?></option>
            </select>
        </div>
        </div>
        <?php endif; ?>        

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="province" class="form-label"><?= lang('app.province_state') ?></label>
                    <select id="province" name="province" class="form-control" onchange="$.post('<?= base_url('getcity/') ?>/', { name: $(this).val() }, function(data) {$('#city').html(data);});" required>
                        <?php foreach (lang('app.provinces') as $key => $value) { ?>
                            <option value="<?= $key ?>" <?= ($record['province'] ?? '') == $key ? 'selected' : '' ?>><?= $value ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="city" class="form-label"><?= lang('app.city') ?></label>
                    <select id="city" name="city" class="form-control" required>
                        <?php if (!empty($record['province']) && is_array(lang('app.' . $record['province']))) 
                        {
                            foreach (lang('app.' . $record['province']) as $key => $value) 
                            {?>
                                <option value="<?= $key ?>" <?= ($record['city'] ?? '') == $key ? 'selected' : '' ?>><?= $value ?></option>
                        <?php 
                            } 
                        }?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="way" class="form-label"><?= lang('app.way_street') ?></label>
                    <input type="text" id="way" name="way" class="form-control" placeholder="Street name" value="<?= esc($record['way'] ?? '') ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="address_line_1" class="form-label"><?= lang('app.address_line1') ?></label>
                    <input type="text" id="address_line_1" name="address_line_1" class="form-control" placeholder="Street address, P.O. box" value="<?= esc($record['address_line_1'] ?? '') ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="address_line_2" class="form-label"><?= lang('app.address_line2') ?></label>
                    <input type="text" id="address_line_2" name="address_line_2" class="form-control" placeholder="Apartment, suite, unit, building, floor, etc." value="<?= esc($record['address_line_2'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="location" class="form-label"><?= lang('app.location') ?></label>
                    <div class="input-group">
                        <input type="text" id="location" name="location" class="form-control" placeholder="Type your address or click the locate button" value="<?= esc($record['location'] ?? '') ?>" aria-label="Location address" required>
                        <button class="btn btn-outline-secondary" type="button" id="locate-btn"><i class="fas fa-map-marker-alt"></i> Locate</button>
                    </div>
                </div>
            </div>

            <div class="map-container mb-3">
                <div id="map" style="width: 100%;"></div>
            </div>

            <input type="hidden" name="latitude" id="latitude" value="<?= esc($record['latitude'] ?? '') ?>">
            <input type="hidden" name="longitude" id="longitude" value="<?= esc($record['longitude'] ?? '') ?>">
            
            <div class="row mb-3">
                <div class="col-md-6 d-flex justify-content-start">
                    <button type="button" class="btn btn-outline-secondary" onclick="loadMe('<?= base_url('dashboard/myprofile') ?>');">
                        <i class="bi bi-arrow-left me-2"></i><?= lang('app.back') ?>
                    </button>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <?= lang('app.update') ?><i class="bi bi-check2 ms-2"></i>
                    </button>
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
    // Get existing coordinates from hidden fields
    const existingLat = parseFloat(document.getElementById("latitude").value) || 0;
    const existingLng = parseFloat(document.getElementById("longitude").value) || 0;
    
    // Use existing coordinates if valid, otherwise default to Muscat
    const initialCoords = (existingLat && existingLng) ? 
        { lat: existingLat, lng: existingLng } : 
        { lat: 23.5880, lng: 58.3829 };
    
    // Initialize map with existing or default coordinates
    map = new google.maps.Map(document.getElementById("map"), {
        center: initialCoords,
        zoom: (existingLat && existingLng) ? 15 : 10,
        streetViewControl: false,
        mapTypeControl: true,
        fullscreenControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
            mapTypeIds: ["roadmap", "satellite"]
        }
    });
    
    geocoder = new google.maps.Geocoder();
    
    // Initialize autocomplete (preserving all original options)
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("location"),
        { 
            types: ["geocode", "establishment"],
            fields: ["geometry", "formatted_address", "name"],
            componentRestrictions: { country: "OM" }
        }
    );
    
    // Maintain original autocomplete behavior
    autocomplete.bindTo('bounds', map);
    document.getElementById("location").addEventListener("keydown", (e) => {
        if (e.key === "Enter") e.preventDefault();
    });
    
    // Initialize marker at existing or default position
    marker = new google.maps.Marker({
        map: map,
        position: initialCoords,
        draggable: true,
        title: "Drag to adjust your location",
    });
    
    // If we have valid existing coordinates, update the address field
    if (existingLat && existingLng) {
        updateAddressFromPosition(initialCoords);
    }
    
    // PRESERVE ALL ORIGINAL EVENT LISTENERS
    autocomplete.addListener("place_changed", onPlaceChanged);
    marker.addListener("dragend", onMarkerDragEnd);
    map.addListener("click", onMapClick);
    document.getElementById("locate-btn").addEventListener("click", locateUser);
}

// REST OF THE ORIGINAL FUNCTIONS REMAIN EXACTLY THE SAME
function onPlaceChanged() {
    const place = autocomplete.getPlace();
    if (!place.geometry) return;
    updateMapLocation(place.geometry.location);
    updatePositionFields(place.geometry.location);
    isLocationSelected = true;
}

function onMarkerDragEnd(event) {
    updatePositionFields(event.latLng);
    updateAddressFromPosition(event.latLng);
    isLocationSelected = true;
}

function onMapClick(event) {
    marker.setPosition(event.latLng);
    updatePositionFields(event.latLng);
    updateAddressFromPosition(event.latLng);
    isLocationSelected = true;
}

function updateMapLocation(position) {
    map.setCenter(position);
    map.setZoom(15);
    marker.setPosition(position);
}

function updatePositionFields(position) {
    document.getElementById("latitude").value = position.lat();
    document.getElementById("longitude").value = position.lng();
}

function updateAddressFromPosition(position) {
    geocoder.geocode({ location: position }, (results, status) => {
        if (status === "OK" && results[0]) {
            document.getElementById("location").value = results[0].formatted_address;   
        }
    });
}

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
            document.getElementById("latitude").value = position.coords.latitude;
            document.getElementById("longitude").value = position.coords.longitude;
            geocoder.geocode({ location: userLocation }, (results, status) => {
                if (status === "OK" && results[0]) {
                    document.getElementById("location").value = results[0].formatted_address;
                }
            });
            updateMapLocation(userLocation);
        },
        (error) => {
            alert("Error getting location: " + error.message);
        }
    );
}
</script>

  <?=google_maps_script()?>