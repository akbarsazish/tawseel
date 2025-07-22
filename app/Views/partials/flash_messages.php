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