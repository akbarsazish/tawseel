<!-- Main Content -->
        <div class="card mb-4">
            <div class="card-header">
                <h5><?= lang('app.business_details') ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="container-fluid">
                        <!-- Company Registration Certificate Section -->
                        <div class="w3-margin-bottom">
                            <header class="w3-container w3-light-grey" onclick="toggleSection('crc')" style="cursor:pointer">
                                <h5><?= lang('app.crc_title') ?> <span class="w3-right">▼</span></h5>
                            </header>
                            <div id="crc" class="w3-container">
                                <div class="w3-row-padding">
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.cr_name_en') ?>:</strong> <?= esc($record[0]['cr_name_en']) ?></p>
                                    </div>
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.cr_name_ar') ?>:</strong> <?= esc($record[0]['cr_name_ar']) ?></p>
                                    </div>
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($record[0]['cr_number']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.email') ?>:</strong> <?= esc($record[0]['cr_email']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.gsm') ?>:</strong> <?= esc($record[0]['cr_gsm']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.po_box') ?>:</strong> <?= esc($record[0]['cr_po_box']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.postal_code') ?>:</strong> <?= esc($record[0]['cr_postal_code']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.fax') ?>:</strong> <?= esc($record[0]['cr_fax']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.establishment_date') ?>:</strong> <?= esc($record[0]['cr_establishment_date']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.expiry_date') ?>:</strong> <?= esc($record[0]['cr_expiry_date']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.legal_type') ?>:</strong> <?= esc($record[0]['cr_legal_type']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.head_quarter') ?>:</strong> <?= esc($record[0]['cr_head_quarter']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.crc') ?>:</strong> 
                                            <a href="<?= base_url('viewFile/'.$record[0]['cr_document']) ?>" target="_blank" class="w3-button w3-light-grey">  <i class="far fa-file-pdf"> </i> <?= lang('app.document') ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Identification Section -->
                        <div class="w3-margin-bottom">
                            <header class="w3-container w3-light-grey" onclick="toggleSection('id')" style="cursor:pointer">
                                <h5><?= lang('app.id_title') ?> <span class="w3-right">▼</span></h5>
                            </header>
                            <div id="id" class="w3-container" style="display:none">
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.id_number') ?>:</strong> <?= esc($record[0]['id_number']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($record[0]['id_expire_date']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.first_name') ?>:</strong> <?= esc($record[0]['id_first_name']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.second_name') ?>:</strong> <?= esc($record[0]['id_second_name']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.third_name') ?>:</strong> <?= esc($record[0]['id_third_name']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.sur_name') ?>:</strong> <?= esc($record[0]['id_sur_name']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.date_of_birth') ?>:</strong> <?= esc($record[0]['id_date_of_birth']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.address_name') ?>:</strong> <?= esc($record[0]['id_address']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.id') ?>:</strong> 
                                            <a href="<?= base_url('viewFile/'.$record[0]['id_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                                <?= lang('app.document') ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Chamber of Commerce Section -->
                        <div class="w3-margin-bottom">
                            <header class="w3-container w3-light-grey" onclick="toggleSection('cc')" style="cursor:pointer">
                                <h5><?= lang('app.cc_title') ?> <span class="w3-right">▼</span></h5>
                            </header>
                            <div id="cc" class="w3-container" style="display:none">
                                <div class="w3-row-padding">
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($record[0]['cc_cr_number']) ?></p>
                                    </div>
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.head_quarter') ?>:</strong> <?= esc($record[0]['cc_head_quarter']) ?></p>
                                    </div>
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.cc_occi_number') ?>:</strong> <?= esc($record[0]['cc_occi_number']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.cc') ?>:</strong> 
                                            <a href="<?= base_url('viewFile/'.$record[0]['cc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                                <?= lang('app.document') ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Trade Authorization Section -->
                        <div class="w3-margin-bottom">
                            <header class="w3-container w3-light-grey" onclick="toggleSection('ta')" style="cursor:pointer">
                                <h5><?= lang('app.ta_title') ?> <span class="w3-right">▼</span></h5>
                            </header>
                            <div id="ta" class="w3-container" style="display:none">
                                <div class="w3-row-padding">
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.governorate') ?>:</strong> <?= esc($record[0]['ta_governorate']) ?></p>
                                    </div>
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.complex_no') ?>:</strong> <?= esc($record[0]['ta_complex_no']) ?></p>
                                    </div>
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.state') ?>:</strong> <?= esc($record[0]['ta_state']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.plot_no') ?>:</strong> <?= esc($record[0]['ta_plot_no']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.area') ?>:</strong> <?= esc($record[0]['ta_area']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.building_no') ?>:</strong> <?= esc($record[0]['ta_building_no']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.street_name_no') ?>:</strong> <?= esc($record[0]['ta_street_name_no']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.flat_shop_no') ?>:</strong> <?= esc($record[0]['ta_flat_shop_no']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.way_no') ?>:</strong> <?= esc($record[0]['ta_way_no']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.type_of_activity') ?>:</strong> <?= esc($record[0]['ta_type_of_activity']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.rent_contract_no') ?>:</strong> <?= esc($record[0]['ta_rent_contract_no']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($record[0]['ta_expire_date']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.ta') ?>:</strong> 
                                            <a href="<?= base_url('viewFile/'.$record[0]['ta_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                                <?= lang('app.document') ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- License Certificate Section -->
                        <div class="w3-margin-bottom">
                            <header class="w3-container w3-light-grey" onclick="toggleSection('lc')" style="cursor:pointer">
                                <h5><?= lang('app.lc_title') ?> <span class="w3-right">▼</span></h5>
                            </header>
                            <div id="lc" class="w3-container" style="display:none">
                                <div class="w3-row-padding">
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($record[0]['lc_cr_number']) ?></p>
                                    </div>
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.governorate') ?>:</strong> <?= esc($record[0]['lc_governorate']) ?></p>
                                    </div>
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.rent_contract_no') ?>:</strong> <?= esc($record[0]['lc_rent_contract_no']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.state') ?>:</strong> <?= esc($record[0]['lc_state']) ?></p>
                                    </div>
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.area') ?>:</strong> <?= esc($record[0]['lc_area']) ?></p>
                                    </div>
                                    <div class="w3-third">
                                        <p><strong><?= lang('app.poa_code') ?>:</strong> <?= esc($record[0]['lc_poa_code']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.license_type') ?>:</strong> <?= esc($record[0]['lc_license_type']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.license_name') ?>:</strong> <?= esc($record[0]['lc_license_name']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.license_number') ?>:</strong> <?= esc($record[0]['lc_license_number']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($record[0]['lc_expire_date']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.activities_code') ?>:</strong> <?= esc($record[0]['lc_activities_code']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.activities_description') ?>:</strong> <?= esc($record[0]['lc_activities_description']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.lc') ?>:</strong> 
                                            <a href="<?= base_url('viewFile/'.$record[0]['lc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                                <?= lang('app.document') ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tax Card Certificate Section -->
                        <div class="w3-margin-bottom">
                            <header class="w3-container w3-light-grey" onclick="toggleSection('tcc')" style="cursor:pointer">
                                <h5><?= lang('app.tcc_title') ?> <span class="w3-right">▼</span></h5>
                            </header>
                            <div id="tcc" class="w3-container" style="display:none">
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($record[0]['tcc_cr_number']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.tax_card_number') ?>:</strong> <?= esc($record[0]['tcc_tax_card_number']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.tin') ?>:</strong> <?= esc($record[0]['tcc_tin']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($record[0]['tcc_expire_date']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.ta') ?>:</strong> 
                                            <a href="<?= base_url('viewFile/'.$record[0]['tcc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                                <?= lang('app.document') ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- VAT Certificate Section -->
                        <div class="w3-margin-bottom">
                            <header class="w3-container w3-light-grey" onclick="toggleSection('vc')" style="cursor:pointer">
                                <h5><?= lang('app.vc_title') ?> <span class="w3-right">▼</span></h5>
                            </header>
                            <div id="vc" class="w3-container" style="display:none">
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($record[0]['vc_cr_number']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.vat_certificate_number') ?>:</strong> <?= esc($record[0]['vc_vat_certificate_number']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.vatin') ?>:</strong> <?= esc($record[0]['vc_vatin']) ?></p>
                                    </div>
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($record[0]['vc_expire_date']) ?></p>
                                    </div>
                                </div>
                                
                                <div class="w3-row-padding">
                                    <div class="w3-half">
                                        <p><strong><?= lang('app.vc') ?>:</strong> 
                                            <a href="<?= base_url('viewFile/'.$record[0]['vc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                                <?= lang('app.document') ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                    function toggleSection(sectionId) 
                    {
                        var section = document.getElementById(sectionId);
                        var header = section.previousElementSibling;
                        var arrow = header.querySelector('span');
                        
                        if (section.style.display === "none") 
                        {
                            section.style.display = "block";
                            arrow.innerHTML = "▲";
                        } 
                        else 
                        {
                            section.style.display = "none";
                            arrow.innerHTML = "▼";
                        }
                    }

                    // Open the first section by default
                    document.addEventListener('DOMContentLoaded', function() {
                        document.getElementById('crc').style.display = "block";
                        document.querySelector('#crc').previousElementSibling.querySelector('span').innerHTML = "▲";
                    });
                    </script>
    
                    
                </div>
            </div>
        </div>
