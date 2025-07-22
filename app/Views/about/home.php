<?= $this->extend('home') ?>
<?= $this->section('title') ?>
    <?= lang('app.title') ?>
<?= $this->endSection() ?>

<?= $this->section('header_title') ?>
  <?=lang('app.about_title')?>
<?= $this->endSection() ?>

<?= $this->section('header_desc') ?>
  <?=lang('app.about_description')?>
  <?= $this->endSection() ?>  

  <?= $this->section('content') ?>

<div id="about" class="section w3-padding-64">
  <div class="container">
    <?php foreach ($sections as $section): ?>
      <?php if ($section['section'] === 'hero'): ?>
        <div class="section-header text-center mb-5">
          <h2 style="color: #229dd9;"><b><?= esc($section['title']) ?></b></h2>
          <p class="w3-large" style="color: #6c757d;"><?= esc($section['content']) ?></p>
        </div>
      
      <?php elseif (in_array($section['section'], ['story', 'vision', 'mission'])): ?>
        <div class="row mb-4">
          <div class="col-lg-12">
            <h3 style="color: #eb6413;"><?= esc($section['title']) ?></h3>
            <p><?= nl2br(esc($section['content'])) ?></p>
          </div>
        </div>
      
      <?php elseif ($section['section'] === 'competencies'): ?>
        <div class="row mb-5">
          <div class="col-lg-12">
            <h3 style="color: #eb6413;"><?= esc($section['title']) ?></h3>
            <div class="w3-card w3-padding" style="border-left: 4px solid #229dd9;">
              <ul class="w3-ul">
                <?php foreach (explode('|', $section['content']) as $item): ?>
                  <li><i class="bi bi-check-circle" style="color: #229dd9;"></i> <?= esc(trim($item)) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      
      <?php elseif ($section['section'] === 'quote'): ?>
        <div class="row mt-5">
          <div class="col-12 text-center">
            <div class="w3-panel w3-leftbar" style="border-left: 4px solid #eb6413;">
              <p class="w3-large"><i>"<?= esc($section['content']) ?>"</i></p>
              <p>- Tawseel E-Commerce & Logistics Team</p>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>
<?= $this->endSection() ?>