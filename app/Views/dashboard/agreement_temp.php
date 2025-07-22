<div class="card mb-4">
   
  <div id="alert" class="w3-container w3-animate-opacity" style="width: 30%; margin:0; display:none; position: fixed; top: 4%; left: 50%; transform: translate(-50%, -50%); z-index: 1000;">
      <div class="w3-pale-green w3-margin-top w3-card w3-round-large" style="position: relative; border-left: 4px solid #4CAF50; width: 100%;">
        <span onclick="$('#alert').hide();" class="w3-button w3-display-topright w3-hover-none w3-text-green" style="padding: 8px 12px; top: 2px; right: 2px;">&times;</span>
        <div style="padding: 12px 30px 12px 20px; display: flex; align-items: center; gap: 12px; max-width: 1200px; margin: 0 auto;">
          <i class="fas fa-check-circle w3-text-green" style="font-size: 1.5em;"></i>
          <div>
            <h4 style="margin: 0 0 4px 0; font-weight: 500;">Agreement updated!</h4>
          </div>
        </div>
      </div>
  </div>


    <form id="myForm" data-url="<?= base_url('dashboard/agreement/create') ?>">
    <?= csrf_field() ?>
    <div class="card-body">
        <header class="dheader">
        <div class="header-container">
            <div class="logo-container">
                <div class="logo"><img src="<?=base_url('loadimg/img/logo.png')?>" width="100%" /></div>
                <div>
                    <div class="logo-text"><bdi contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'title', value: $(this).text() })"><?= $record['title'] ?></bdi>
                        <span contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'title_2', value: $(this).text() })"><?= $record['title_2'] ?></span>
                    </div>
                    <div class="contract-title"><bdi contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'title_desc', value: $(this).text() })"><?= $record['title_desc'] ?></bdi> <i>(Version <?=$record['version']?>)</i></div>
                </div>
            </div>
            <div class="controls">
                <button type="button" class="control-btn"><i class="fas fa-download"></i>Download PDF</button>
                <button type="button" class="control-btn"><i class="fas fa-print"></i>Print</button>
            </div>
        </div>
    </header>
    
    <div class="main-container">
        <div class="contract-meta">
            <div class="meta-grid">
                <div class="meta-item">
                    <div class="meta-title">Contract Number</div>
                    <div class="meta-content">#Auto</div>
                </div>
                <div class="meta-item">
                    <div class="meta-title">Effective Date</div>
                    <div class="meta-content">#Auto</div>
                </div>
                <div class="meta-item">
                    <div class="meta-title">Status</div>
                    <div class="meta-content">Active <span style="color: green;"><i class="fas fa-check-circle"></i></span></div>
                </div>
                <div class="meta-item">
                    <div class="meta-title">Term</div>
                    <div class="meta-content" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'term_sub', value: $(this).text() })"><?= $record['term_sub'] ?></div>
                </div>
            </div>
        </div>
        
        <div class="contract-content">
            <div class="content-header">
                <h1 class="agreement-title">Confidential Contract for Logistics Services</h1>
                <div class="effective-date">Effective as of #Auto</div>
            </div>
            
            <div class="parties-section">
                <h2 class="section-title"><i class="fas fa-handshake"></i>Contracting Parties</h2>
                <div class="party-container">
                    <div class="party-card">
                        <div class="party-name"><i class="fas fa-truck"></i>Logistics Service Provider</div>
                        <div class="party-details">
                            <div class="detail-label">Legal Name:</div>
                            <div class="detail-value">#Auto</div>
                            
                            <div class="detail-label">Commercial Name:</div>
                            <div class="detail-value">#Auto</div>
                            
                            <div class="detail-label">Address:</div>
                            <div class="detail-value">#Auto</div>
                            
                            <div class="detail-label">CR No.:</div>
                            <div class="detail-value">#Auto</div>
                            
                            <div class="detail-label">OCCI No.:</div>
                            <div class="detail-value">#Auto</div>
                            
                            <div class="detail-label">Phone:</div>
                            <div class="detail-value">#Auto</div>
                        </div>
                    </div>
                    
                    <div class="party-card">
                        <div class="party-name"><i class="fas fa-building"></i> Company</div>
                        <div class="party-details">
                            <div class="detail-label">Legal Name:</div>
                            <div class="detail-value" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'legal_name', value: $(this).text() })"><?= $record['legal_name'] ?></div>
                            
                            <div class="detail-label">Commercial Name:</div>
                            <div class="detail-value" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'commercial_name', value: $(this).text() })"><?= $record['commercial_name'] ?></div>
                            
                            <div class="detail-label">Address:</div>
                            <div class="detail-value" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'address', value: $(this).text() })"><?= $record['address'] ?></div>
                            
                            <div class="detail-label">CR No.:</div>
                            <div class="detail-value" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'cr_no', value: $(this).text() })"><?= $record['cr_no'] ?></div>
                            
                            <div class="detail-label">Phone:</div>
                            <div class="detail-value" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'phone', value: $(this).text() })"><?= $record['phone'] ?></div>
                            
                            <div class="detail-label">Email:</div>
                            <div class="detail-value" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'email', value: $(this).text() })"><?= $record['email'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="recitals-section">
                <h2 class="section-title"><i class="fas fa-file-contract"></i> Recitals</h2>
                <div class="clause-content">
                    <p>WHEREAS, <strong>#Auto</strong> Logistics Service Provider has expertise and experience in providing these services; and;</p>
                    <p>WHEREAS, <strong contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'legal_name', value: $(this).text() })"><?= $record['legal_name'] ?></strong> imports goods from domestic and overseas market and has need of a Logistics Service Provider to help manage and coordinate the importing process; and</p>
                    <p>WHEREAS, <strong>#Auto</strong> wishes to utilise Logistics Service Provider's services in connection with the importation of 
                    <strong contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'legal_name', value: $(this).text() })"><?= $record['legal_name'] ?></strong> goods and Services.</p>
                    <p>NOW, THEREFORE, in consideration of the premises and the mutual agreements set forth herein and for other good and valuable consideration, the receipt and sufficiency of which is hereby acknowledged, the parties agree as follows:</p>
                </div>
            </div>
            
            <div class="clause-container">
                <h2 class="section-title"><i class="fas fa-clipboard-list"></i> Contract Terms</h2>
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-list-ul"></i> Recitals</div>
                    <div class="clause-content" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'recitals_desc', value: $(this).text() })"><?= $record['recitals_desc'] ?></div>
                </div>
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-calendar-alt"></i> Term</div>
                    <div class="clause-content" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'term_desc', value: $(this).text() })"><?= $record['term_desc'] ?></div>
                </div>
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-handshake"></i> Appointment of Logistics Service Provider</div>
                    <div class="clause-content" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'appointment_desc', value: $(this).text() })"><?= $record['appointment_desc'] ?></div>
                </div>
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-shipping-fast"></i> Logistics Services</div>
                    <div class="clause-content">
                        Logistics Service Provider shall have the following responsibilities:
                        <ol>
<pre style="font-family: inherit;" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'logistics_desc', value: $(this).text() })"><?= $record['logistics_desc'] ?></pre>
                        </ol>
                    </div>
                </div>
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-money-bill-wave"></i> Compensation and Payment</div>
                    <div class="clause-content" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'compensation_desc', value: $(this).text() })"><?= $record['compensation_desc'] ?></div>
                </div>
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-balance-scale"></i> Liability</div>
                    <div class="clause-content" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'liability_desc', value: $(this).text() })"><?= $record['liability_desc'] ?></div>
                </div>
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-shield-alt"></i> Insurance</div>
                    <div class="clause-content" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'insurance_desc', value: $(this).text() })"><?= $record['insurance_desc'] ?></div>
                </div>
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-gavel"></i> Governing Law / Dispute Resolution</div>
                    <div class="clause-content" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'law_desc', value: $(this).text() })"><?= $record['law_desc'] ?></div>
                </div>
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-file-signature"></i> Termination</div>
                    <div class="clause-content" contenteditable="true" onblur="$.post('<?= base_url('agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'termination_desc', value: $(this).text() })"><?= $record['termination_desc'] ?></div>
                </div>
            </div>
            
            <div class="signatures">
                <div class="signature-block">
                    <div class="signature-title">For Tawseel E-Commerce and Logistics LLC</div>
                    <div class="signature-line"></div>
                    <div class="signature-name">Authorized Signatory</div>
                    <div class="signature-date">Date: #Auto</div>
                </div>
                
                <div class="signature-block">
                    <div class="signature-title">For #Auto</div>
                    <div class="signature-line"></div>
                    <div class="signature-name">Authorized Signatory</div>
                    <div class="signature-date">Date: #Auto</div>
                </div>
            </div>
        </div>
    </div>
    

        <div class="row mb-3">
            <div class="col-md-6 d-flex justify-content-start">
                <button type="button" class="btn btn-outline-secondary" onclick="loadMe('<?= base_url('dashboard/agreement/templates') ?>')">
                    <i class="bi bi-arrow-left me-2"></i><?= lang('app.back') ?>
                </button>
            </div>

            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-danger px-4" onclick="loadMe('<?= base_url('dashboard/agreement/delete/'.enc($record['id'])) ?>')"><?= lang('app.delete') ?></button>
            </div>
        </div>   
    </div>
</div>

<script>
    $(document).ready(function() 
    {
        $('[contenteditable]').on('focus', function() 
        {
            setTimeout(function() 
            {
                $('#alert').hide();
            }, 3000);
        });
                
        $('[contenteditable]').on('blur', function() 
        {
            $('#alert').show();
        });
    });
</script>
<!-- All editable elements with data attributes -->
