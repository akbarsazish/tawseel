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

    <div class="card-body">
        <header class="dheader">
        <div class="header-container">
            <div class="logo-container">
                <div class="logo"><img src="<?=base_url('loadimg/img/logo.png')?>" width="100%" /></div>
                <div>
                    <div class="logo-text">
                        <bdi contenteditable="true" onblur="updatefield(this, 'title');"><?= $record['title'] ?></bdi>
                        <span contenteditable="true" onblur="$.post('<?= base_url('dashboard/agreement/updatefield') ?>', { id: '<?= $record['id'] ?>', field: 'title_2', value: $(this).text() })"><?= $record['title_2'] ?></span>
                    </div>
                    <div class="contract-title">
                        <span contenteditable="true" onblur="updatefield(this, 'title_2');"><?= $record['title_2'] ?></span>
                         <i>(Version <?=$record['version']?>)</i>
                    </div>
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
                    <div class="meta-content" contenteditable="true" onblur="updatefield(this, 'term_sub');"><?= $record['term_sub'] ?></div>
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
                            <div class="detail-value" contenteditable="true" onblur="updatefield(this, 'legal_name');"><?= $record['legal_name'] ?></div>
                            
                            <div class="detail-label">Commercial Name:</div>
                            <div class="detail-value" contenteditable="true" onblur="updatefield(this, 'commercial_name');"><?= $record['commercial_name'] ?></div>
                            
                            <div class="detail-label">Address:</div>
                            <div class="detail-value" contenteditable="true" onblur="updatefield(this, 'address');"><?= $record['address'] ?></div>
                            
                            <div class="detail-label">CR No.:</div>
                            <div class="detail-value" contenteditable="true" onblur="updatefield(this, 'cr_no');"><?= $record['cr_no'] ?></div>
                            
                            <div class="detail-label">Phone:</div>
                            <div class="detail-value" contenteditable="true" onblur="updatefield(this, 'phone');"><?= $record['phone'] ?></div>
                            
                            <div class="detail-label">Email:</div>
                            <div class="detail-value" contenteditable="true" onblur="updatefield(this, 'email');"><?= $record['email'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="recitals-section">
                <h2 class="section-title"><i class="fas fa-file-contract"></i> Recitals</h2>
                <div class="clause-content">
                    <p>WHEREAS, <strong>#Auto</strong> Logistics Service Provider has expertise and experience in providing these services; and;</p>
                    <p>WHEREAS, <strong contenteditable="true" onblur="updatefield(this, 'legal_name');"><?= $record['legal_name'] ?></strong> imports goods from domestic and overseas market and has need of a Logistics Service Provider to help manage and coordinate the importing process; and</p>
                    <p>WHEREAS, <strong>#Auto</strong> wishes to utilise Logistics Service Provider's services in connection with the importation of 
                    <strong contenteditable="true" onblur="updatefield(this, 'legal_name');"><?= $record['legal_name'] ?></strong> goods and Services.</p>
                    <p>NOW, THEREFORE, in consideration of the premises and the mutual agreements set forth herein and for other good and valuable consideration, the receipt and sufficiency of which is hereby acknowledged, the parties agree as follows:</p>
                </div>
            </div>
            
            <div class="clause-container">
                <h2 class="section-title"><i class="fas fa-clipboard-list"></i> Contract Terms</h2>
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-list-ul"></i> 1 Recitals</div>
                    <div class="clause-content" contenteditable="true" onblur="updatefield(this, 'recitals_desc');"><?= $record['recitals_desc'] ?></div>
                </div>
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-calendar-alt"></i> 2 Term</div>
                    <div class="clause-content" contenteditable="true" onblur="updatefield(this, 'term_desc');"><?= $record['term_desc'] ?></div>
                </div>
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-handshake"></i> 3 Appointment of Logistics Service Provider</div>
                    <div class="clause-content" contenteditable="true" onblur="updatefield(this, 'appointment_desc');"><?= $record['appointment_desc'] ?></div>
                </div>
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-shipping-fast"></i> 4 Logistics Services</div>
                    <div class="clause-content">
                        Logistics Service Provider shall have the following responsibilities:
                        <ol>
                            <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'logistics_desc');"><?= $record['logistics_desc'] ?></pre>
                        </ol>
                        The specific tasks encompassed by these services shall be set forth in the Standard Operating Procedures (“SOP”) for this Agreement, which are attached hereto as Exhibit A [Note: Exhibit A already used for #Auto affiliate listings] and made a part hereof by reference, and/or in written instructions from #Auto. The Logistics Service Provider agrees to perform all tasks reasonably related to the services set forth above.
                    </div>
                </div>

                <div class="clause">
                    <div class="clause-title"><i class="fas fa-user-tie"></i> 5 Agreement Administration</div>
                    <div class="clause-content">
                        <p>5.1 <strong>Account Management.</strong> The Logistics Service Provider shall designate a senior-level executive to be the Account Manager responsible for overseeing <strong>#Auto</strong>’s account. The Account Manager must have the authority to make decisions concerning all elements of <strong>#Auto</strong>’s account.</p>
                        
                        <p>Other responsibilities of the Account Manager will include:</p>
                        <ol class="clause-subpoints">
                            <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'agreement_administration');"><?= $record['agreement_administration'] ?></pre>
                        </ol>
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'agreement_administration_1');"><?=$record['agreement_administration_1']?></pre>
                    </div>
                </div>                
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-money-bill-wave"></i> 6 Compensation and Payment</div>
                    <div class="clause-content">
                        <pre style="font-family: inherit; white-space: pre-wrap;"  contenteditable="true" onblur="updatefield(this, 'compensation_desc');"><?= $record['compensation_desc'] ?></pre>
                    </div>
                </div>

                <div class="clause">
                    <div class="clause-title"><i class="fas fa-user-tag"></i> 7 Independent Contractor</div>
                    <div class="clause-content">
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'independent_contractor_desc');"><?=$record['independent_contractor_desc']?></pre>
                    </div>
                </div>                

                <?php
                    $lines = explode("\n", trim($record['liability_desc']));
                    $lastLine = trim($lines[count($lines) - 1]);
                    $lastLineNumber = explode(' ', $lastLine)[0]+0.1;
                ?> 

                <div class="clause">
                    <div class="clause-title"><i class="fas fa-balance-scale"></i> 8 Liability</div>
                    <div class="clause-content">
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'liability_desc');"><?= $record['liability_desc'] ?></pre>

                        <pre style="margin-bottom: 0px; font-family: inherit; white-space: pre-wrap;"><?=$lastLineNumber.' '.$record['legal_name']?> shall have</pre>
                        <pre style="margin-left:2rem; font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'liability_desc_sub');"><?=$record['liability_desc_sub']?></pre>
                        
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'liability_desc_part2');"><?=$record['liability_desc_part2']?></pre>

                        <pre style="margin-bottom: 0px; font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'liability_sub');"><?=$record['liability_sub']?></pre>
                        <pre style="margin-left:2rem; font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'liability_sub_desc');"><?= $record['liability_sub_desc'] ?></pre>
                    </div>
                </div>

                <div class="clause">
                    <div class="clause-title"><i class="fas fa-receipt"></i> 9 Receipts</div>
                    <div class="clause-content">
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'receipts');"><?=$record['receipts'] ?></pre>
                    </div>
                </div>                

                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-shield-alt"></i> 10 Insurance</div>
                    <div class="clause-content">
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'insurance_desc');"><?=$record['insurance_desc'] ?></pre>

                        <pre style="margin-bottom: 0px; font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'insurance_sub');"><?=$record['insurance_sub']?></pre>
                        <pre style="margin-left:2rem; font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'insurance_sub_desc');"><?= $record['insurance_sub_desc'] ?></pre>

                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'insurance_desc_part2');"><?=$record['insurance_desc_part2'] ?></pre>
                    </div>
                </div>

                <div class="clause">
                    <div class="clause-title"><i class="fas fa-ban"></i> 11 No Lien</div>
                    <div class="clause-content">
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'no_lien_desc');"><?=$record['no_lien_desc']?></pre>
                    </div>
                </div>                
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-gavel"></i> 11 Governing Law / Dispute Resolution</div>
                    <div class="clause-content" contenteditable="true" onblur="updatefield(this, 'law_desc');"><?= $record['law_desc'] ?></div>
                </div>

                <div class="clause">
                    <div class="clause-title"><i class="fas fa-file-alt"></i> 13 Records; Audit</div>
                    <div class="clause-content">
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'records_audit_desc');"><?= $record['records_audit_desc']?></pre>
                    </div>
                </div>

                <div class="clause">
                    <div class="clause-title"><i class="fas fa-leaf"></i> 14 Environmental Policy</div>
                    <div class="clause-content">
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'environmental_policy_desc');"><?= $record['environmental_policy_desc'] ?></pre>
                    </div>
                </div>                

                <div class="clause">
                    <div class="clause-title"><i class="fas fa-gavel"></i> 15 Compliance with Applicable Laws and Regulations</div>
                    <div class="clause-content">
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'compliance_laws_desc');"><?= $record['compliance_laws_desc'] ?></pre>
                    </div>
                </div>

                <div class="clause">
                    <div class="clause-title"><i class="fas fa-ban"></i> 16 Prohibited Payments</div>
                    <div class="clause-content">
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'prohibited_payments_desc');"><?= $record['prohibited_payments_desc'] ?></pre>
                        <pre style="margin-left:2rem; font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'prohibited_payments_sub');"><?= $record['prohibited_payments_sub'] ?></pre>
                        
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'prohibited_payments_sub_desc');"><?= $record['prohibited_payments_sub_desc'] ?></pre>
                        <pre style="margin-left:2rem; font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'prohibited_payments_sub_desc2');"><?= $record['prohibited_payments_sub_desc2'] ?></pre>
                    </div>
                </div>   
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-globe"></i> 17 Global Conditions</div>
                    <div class="clause-content">
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'global_conditions_desc');"><?= $record['global_conditions_desc'] ?></pre>
                    </div>
                </div>

                <div class="clause">
                <div class="clause-title"><i class="fas fa-handshake-slash"></i> 18 Non-Assignability</div>
                    <div class="clause-content">
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'non_assignability_desc');"><?= $record['non_assignability_desc'] ?></pre>
                    </div>
                </div>

                <div class="clause">
                    <div class="clause-title"><i class="fas fa-lock"></i> 19 Confidentiality</div>
                    <div class="clause-content">
                        <pre style="font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'confidentiality');"><?= $record['confidentiality'] ?></pre>
                    </div>
                </div>                
                
                <div class="clause">
                    <div class="clause-title"><i class="fas fa-file-signature"></i> 20 Termination</div>
                    <div class="clause-content">
                        <pre style="margin-left:2rem; font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'termination_desc');"><?= $record['termination_desc'] ?></pre>
                        <pre style="margin-left:2rem; font-family: inherit; white-space: pre-wrap;" contenteditable="true" onblur="updatefield(this, 'confidentiality_desc');"><?= $record['confidentiality_desc'] ?></pre>
                    </div>
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

<script>
     function updatefield(element, fieldName) 
     {
        const originalContent = element.innerText;
    
        $.post('<?= base_url('dashboard/agreement/updatefield') ?>', {
            id: '<?= $record['id'] ?>',
            field: fieldName,
            value: originalContent
        }, function(response) 
        {
            element.innerHTML = originalContent.replace(/(\d+\.)/g, '<strong>$1</strong>').replace(/\n/g, '<br>');
        });
    }
</script>