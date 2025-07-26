<?= $this->extend('home') ?>
<?= $this->section('title') ?>
    <?= lang('app.title') ?>
<?= $this->endSection() ?>

<?= $this->section('header_title') ?>
 <?= isset($partnerships['title_en']) ? esc($partnerships['title_en']) : '' ?>
<?= $this->endSection() ?>

<?= $this->section('header_desc') ?>
<?= isset($partnerships['subtitle_en']) ? esc($partnerships['subtitle_en']) : '' ?> 
<?= $this->endSection() ?> 

<?= $this->section('content') ?>
   
<div class="container my-5">
  <div class="partners-section">
        <!-- Partner 1 -->

         <?php if (isset($items) && !empty($items)): ?>
            <?php foreach ($items as $item): ?>
                <div class="partner-card">
                    <div class="partner-header">
                        <?php
                            $images = glob(WRITEPATH . 'uploads/partnership/item_' . $item['id'] . '.*');
                            if ($images):
                                $imageFile = $images[0];
                        ?>
                            <img src="<?=base_url('loadimg/partnership/' . basename($imageFile))?>"
                                style="width:100px; border-radius:5px;" class="mt-2" alt="Partnership Image">
                        <?php else: ?>
                            <p>No image found for item <?= esc($item['id']) ?></p>
                        <?php endif; ?>
                        <div class="partner-name"> <?= esc($item['title_en']) ?> </div>
                    </div>
                    <div class="partner-desc">
                        <?= esc($item['description_en']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No partnership items found.</p>
        <?php endif; ?>
    
    </div>
</div>

<?= $this->endSection() ?>