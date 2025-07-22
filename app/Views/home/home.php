<?= $this->extend('home') ?>
<?= $this->section('title') ?>
    <?= lang('app.title') ?>
<?= $this->endSection() ?>

<?= $this->section('header_title') ?>
     <?= esc($homeInfos[0]['title_en']) ?>
  <span class="circle aos-init aos-animate" data-aos="fade-right" data-aos-delay="800">
      <span><br> <?= esc($homeInfos[0]['title2_en']) ?> </span>
  </span>
<?= $this->endSection() ?>

<?= $this->section('header_desc') ?>
   <?= esc($homeInfos[0]['description_en']) ?>
<?= $this->endSection() ?>  

  <?= $this->section('content') ?>
      <!-- Facts About Launch -->
      <section class="text-center u-content-space pb-0">
        <div class="container">
          <header class="w-md-50 mx-auto mb-8">
            <h2 class="h1 font-weight-light mb-3"> </b> <?= isset($highLights['title_en']) ? esc($highLights['title_en']) : '' ?> </h2>
            <p class="lead"> <?= isset($highLights['subtitle_en']) ? esc($highLights['subtitle_en']) : '' ?> </p>
          </header>

          <!-- Row -->
          <div class="row mb-9">
            <?php foreach ($highlightItems as $highlightItem): ?>
              <div class="col-lg-4 mb-6 mb-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="display-4 mb-2 mycolor2">
                  <i class="<?= esc($highlightItem['icon']) ?>"></i>
                </div>
                  <h4 class="font-weight-light" > <?= esc($highlightItem['title_en']) ?> </h4>
                  <p class="mb-0"> <?= esc($highlightItem['description_en']) ?> </p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
      <!-- End Facts About Launch -->
<?= $this->endSection() ?>