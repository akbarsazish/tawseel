<?= $this->extend('home') ?>
<?= $this->section('title') ?>
    <?= lang('app.title') ?>
<?= $this->endSection() ?>

<?= $this->section('header_title') ?>
  <?=lang('app.eCommerce_title')?>
<?= $this->endSection() ?>

<?= $this->section('header_desc') ?>
  <?=lang('app.eCommerce_description')?>
  <?= $this->endSection() ?>  

  <?= $this->section('content') ?>

          <!-- Row -->
          <div id="services" class="section">
          <div class="top-icon-box position-relative">
            <div class="container position-relative">
              <div class="section-header">
                <h2><span><?=lang('app.whyChooseUs')?></span></h2>
                <p><span><?=lang('app.whyChooseUs2')?></span></p>
              </div>
              <div class="row gy-4">
      
                <div class="col-xl-4 col-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon-box">
                    <div class="icon">
                      <img src="assets/img/logo-white-without-dot-color.png" alt="icon">
                    </div>
                    <h4 class="title">
                      <a href="https://c2c.tawseelonline.om" class="stretched-link"><?= lang('app.whyChooseUsT1') ?><br>
                    </a>
                  </h4>
                    <p><?= lang('app.whyChooseUsD1') ?></p>
                  </div>
                </div>
                <!--End Icon Box -->
      
                <div class="col-xl-4 col-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                    <div class="icon">
                      <img src="assets/img/logos.png" alt="icon">
                    </div>
                    <h4 class="title">
                      <a href="https://store.tawseelonline.om" class="stretched-link">
                        <?= lang('app.whyChooseUsT2') ?>
                        <br>
                      </a>
                    </h4>
                    <p><?= lang('app.whyChooseUsD2') ?>.</p>
                  </div>
                </div>
                <!--End Icon Box -->
      
                <div class="col-xl-4 col-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                  <div class="icon-box">
                    <div class="icon">
                      <img src="assets/img/logod.png" alt="icon">
                    </div>
                    <h4 class="title">
                      <a href="https://souq.tawseelonline.om" class="stretched-link"><?= lang('app.whyChooseUsT3') ?>
                    </a>
                  </h4>
                    <p><?= lang('app.whyChooseUsD3') ?></p>
                  </div>
                </div>
</div>
</div>
</div>
</div> 
<!--End Icon Box -->
          <!-- Row -->
          <div id="services" class="section">
          <div class="top-icon-box position-relative">
            <div class="container position-relative">
              <div class="section-header">
                <h2><span lang="en-gb"><?=lang('app.services')?></span></h2>
                <p><span lang="en-gb"><?=lang('app.services_title')?></span></p>
              </div>
              <div class="row gy-4">
      
                <div class="col-xl-4 col-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon-box">
                    <div class="icon">
                      <img src="<?=base_url('assets/img/b2b.png')?>" alt="icon">
                    </div>
                    <h4 class="title">
                      <a href="javascript:void(0);" class="stretched-link"><?= lang('app.b2b') ?><br></a>
                  </h4>
                    <p><?= lang('app.b2b_title') ?></p>
                    <a href="<?=base_url('signup/eCommerce/b2b')?>" class="stretched-link">
                      <button class="w3-button mybbg w3-text-white"><?=lang('app.signup')?></button>
                    </a>
                  </div>
                </div>
                <!--End Icon Box -->
      
                <div class="col-xl-4 col-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                    <div class="icon">
                      <img src="<?=base_url('assets/img/b2c.png')?>" alt="icon">
                    </div>
                    <h4 class="title">
                      <a href="<?=base_url('signup/eCommerce/b2c')?>" class="stretched-link">
                        <?= lang('app.b2c') ?>
                        <br>
                      </a>
                    </h4>
                    <p><?= lang('app.b2c_title') ?></p>
                    <a href="<?=base_url('signup/eCommerce/b2c')?>" class="stretched-link">
                      <button class="w3-button mybbg w3-text-white"><?=lang('app.signup')?></button>
                      </a>
                  </div>
                </div>
                <!--End Icon Box -->
      
                <div class="col-xl-4 col-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                  <div class="icon-box">
                    <div class="icon">
                      <img src="<?=base_url('assets/img/c2c.png')?>" alt="icon">
                    </div>
                    <h4 class="title">
                      <a href="<?=base_url('signup/eCommerce/c2c')?>" class="stretched-link">
                      <?= lang('app.c2c') ?>
                    </a>
                  </h4>
                  <p><?= lang('app.c2c_title') ?></p>
                    <a href="<?=base_url('signup/eCommerce/c2c')?>" class="stretched-link">
                      <button class="w3-button mybbg w3-text-white"><?=lang('app.signup')?></button>
                      </a>
                  </div>
                </div>
</div>
</div>
</div>
</div> 
<?= $this->endSection() ?>