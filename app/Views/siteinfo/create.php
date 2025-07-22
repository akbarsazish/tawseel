<div class="card mb-4">
    <div class="card-header">
        <h3 class="h4 mb-0"><?= lang('app.tawseel_info') ?></h3>
    </div>
    <div class="card-body p-4">
        <form id="myForm" data-url="<?= base_url('siteinfo/save') ?>" method="POST">
        <?= csrf_field() ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="facebook">Facebook URL</label>
                        <input type="url" name="facebook" id="facebook" class="form-control" 
                                value="<?= old('facebook', $siteInfo->facebook ?? '') ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="instagram">Instagram URL</label>
                        <input type="url" name="instagram" id="instagram" class="form-control" 
                                value="<?= old('instagram', $siteInfo->instagram ?? '') ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="twitter">Twitter URL</label>
                        <input type="url" name="twitter" id="twitter" class="form-control" 
                                value="<?= old('twitter', $siteInfo->twitter ?? '') ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="youtube">YouTube URL</label>
                        <input type="url" name="youtube" id="youtube" class="form-control" 
                                value="<?= old('youtube', $siteInfo->youtube ?? '') ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="linkedin">LinkedIn URL</label>
                        <input type="url" name="linkedin" id="linkedin" class="form-control" 
                                value="<?= old('linkedin', $siteInfo->linkedin ?? '') ?>">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" 
                                value="<?= old('email', $siteInfo->email ?? '') ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control" 
                                value="<?= old('phone', $siteInfo->phone ?? '') ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="address_ar">Address (Arabic)</label>
                        <textarea name="address_ar" id="address_ar" class="form-control" 
                                    rows="3"><?= old('address_ar', $siteInfo->address_ar ?? '') ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="address_en">Address (English) </label>
                        <textarea name="address_en" id="address_en" class="form-control" 
                                    rows="3"><?= old('address_en', $siteInfo->address_en ?? '') ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="location">Location (Embed Code)</label>
                        <textarea name="location" id="location" class="form-control" 
                                    rows="3"><?= old('location', $siteInfo->location ?? '') ?></textarea>
                        <small class="form-text text-muted">
                            Paste Google Maps embed code or coordinates here
                        </small>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                <button onclick="loadMe('<?= base_url('siteinfo') ?>')" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i><?= lang('app.back') ?>
                </button>
                <button type="submit" class="btn btn-primary px-4">
                    <?= lang('app.save') ?> <i class="bi bi-check2 ms-2"></i>
                </button>
            </div>
            
        </form>
   </div>
</div>
</div>
