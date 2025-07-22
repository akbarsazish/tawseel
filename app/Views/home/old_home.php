<?= $this->extend('home') ?>
<?= $this->section('title') ?>
    <?= lang('app.title') ?>
<?= $this->endSection() ?>

<?= $this->section('header_title') ?>
  <?=lang('app.title')?><span class="circle aos-init aos-animate" data-aos="fade-right" data-aos-delay="800"><span><br><?=lang('app.title2')?></span></span>
<?= $this->endSection() ?>

<?= $this->section('header_desc') ?>
  <?=lang('app.announcement')?>
  <?= $this->endSection() ?>  

  <?= $this->section('content') ?>
      <!-- Facts About Launch -->
      <section class="text-center u-content-space pb-0">
        <div class="container">
          <header class="w-md-50 mx-auto mb-8">
            <h2 class="h1 font-weight-light mb-3"><?=lang('app.keyHighlights')?></h2>
            <p class="lead"><?=lang('app.keyHighlightsDecs')?></p>
          </header>

          <!-- Row -->
          <div class="row mb-9">
            <div class="col-lg-4 mb-6 mb-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
              <div class="display-4 mb-2 mycolor2">
                <i class="fas fa-rocket"></i>
              </div>
                <h4 class="font-weight-light" ><?= lang('app.commitment_to_innovation') ?></h4>
                <p class="mb-0"><?= lang('app.commitment_description') ?></p>
            </div>

            <div class="col-lg-4 mb-6 mb-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
              <div class="display-4 mycolor2 mb-2">
                <i class="far fa-handshake"></i>
              </div>
              <h4 class="font-weight-light"><?= lang('app.client_centric_approach') ?></h4>
              <p class="mb-0"><?= lang('app.client_centric_approach_description') ?></p>
            </div>

            <div class="col-lg-4 mb-6 mb-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
              <div class="display-4 mycolor2 mb-2">
                <i class="fas fa-cubes"></i>
              </div>
              <h4 class="font-weight-light"><?=lang('app.advanced_technology')?></h4>
              <p class="mb-0"><?=lang('app.advanced_technology_description')?></p>
            </div>
          </div>
        </div>
      </section>
      <!-- End Facts About Launch -->
<?= $this->endSection() ?>