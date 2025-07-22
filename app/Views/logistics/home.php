<?= $this->extend('home') ?>
<?= $this->section('title') ?>
    <?= lang('app.title') ?>
<?= $this->endSection() ?>

<?= $this->section('header_title') ?>
  <?=lang('app.logistics_title')?>
<?= $this->endSection() ?>

<?= $this->section('header_desc') ?>
  <?=lang('app.logistics_description')?>
  <?= $this->endSection() ?>  

  <?= $this->section('content') ?>


  <section id="testimonials" class="testimonials">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-header">
          <h2><?=lang('app.our_services')?></h2>
          <p><?=lang('app.our_services2')?></p>
        </div>
        <div class="slides-3 swiper swiper-initialized swiper-horizontal swiper-pointer-events aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper" id="swiper-wrapper-2f3d3b27cde584c7" aria-live="off" style="transform: translate3d(-3008px, 0px, 0px); transition-duration: 0ms;">

            <div class="swiper-slide" data-swiper-slide-index="0" role="group" aria-label="1 / 7" style="width: 376px;">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center info-box">
                    <img src="assets/img/logo-white-without-dot-color.png" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3><?= lang('app.our_servicesT1') ?></h3>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                      <?= lang('app.our_servicesD1') ?>
                     <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>
            <!-- End testimonial item -->

            <div class="swiper-slide" data-swiper-slide-index="1" role="group" aria-label="2 / 7" style="width: 376px;">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center info-box">
                    <img src="assets/img/logo-white-without-dot-color.png" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3><?= lang('app.our_servicesT2') ?></h3>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                      <?= lang('app.our_servicesD2') ?>
          					<i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide" data-swiper-slide-index="2" role="group" aria-label="3 / 7" style="width: 376px;">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center info-box">
                    <img src="assets/img/logo-white-without-dot-color.png" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3><?= lang('app.our_servicesT3') ?></h3>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                      <?= lang('app.our_servicesD3') ?>               
				            <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide" data-swiper-slide-index="3" role="group" aria-label="4 / 7" style="width: 376px;">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center info-box">
                    <img src="assets/img/logo-white-without-dot-color.png" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3><?= lang('app.our_servicesT4') ?></h3>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                      <?= lang('app.our_servicesD4') ?>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->
             <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="4" role="group" aria-label="5 / 7" style="width: 376px;">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center info-box">
                    <img src="assets/img/logo-white-without-dot-color.png" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3><?= lang('app.our_servicesT5') ?></h3>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <?= lang('app.our_servicesD5') ?>
						        <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="5" role="group" aria-label="6 / 7" style="width: 376px;">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center info-box">
                    <img src="assets/img/logo-white-without-dot-color.png" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3><?= lang('app.our_servicesT6') ?></h3>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <?= lang('app.our_servicesD6') ?>
						      <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>
            <!-- End testimonial item -->
          </div>
          <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 6" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 7"></span></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>  
      </div>
</section>


      
          <!-- End Row -->

        </div>
      </section>
      <!-- End Facts About Launch -->

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
                      <img src="<?=base_url('assets/img/1pl.png')?>" alt="icon">
                    </div>
                    <h4 class="title">
                      <a href="<?=base_url('signup/logistics/1pl')?>" class="stretched-link">
                        <?= lang('app.1pl') ?><br>
                    </a>
                  </h4>
                    <p><?= lang('app.1pl_title') ?></p>
                    <a href="<?=base_url('signup/logistics/1pl')?>" class="stretched-link">
                      <button class="w3-button mybbg w3-text-white"><?=lang('app.signup')?></button>
                      </a>
                  </div>
                </div>
                <!--End Icon Box -->
      
                <div class="col-xl-4 col-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                    <div class="icon">
                      <img src="<?=base_url('assets/img/2pl.png')?>" alt="icon">
                    </div>
                    <h4 class="title">
                      <a href="<?=base_url('signup/logistics/2pl')?>" class="stretched-link">
                        <?= lang('app.2pl') ?>
                        <br>
                      </a>
                    </h4>
                    <p><?= lang('app.2pl_title') ?></p>
                    <a href="<?=base_url('signup/logistics/2pl')?>" class="stretched-link">
                      <button class="w3-button mybbg w3-text-white"><?=lang('app.signup')?></button>
                      </a>
                  </div>
                </div>
                <!--End Icon Box -->
      
                <div class="col-xl-4 col-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                  <div class="icon-box">
                    <div class="icon">
                      <img src="<?=base_url('assets/img/34pl.png')?>" alt="icon">
                    </div>
                    <h4 class="title">
                      <a href="<?=base_url('signup/logistics/34pl')?>" class="stretched-link">
                      <?= lang('app.3_4pl') ?>
                    </a>
                  </h4>
                  <p><?= lang('app.34pl_title') ?></p>
                    <a href="<?=base_url('signup/logistics/34pl')?>" class="stretched-link">
                    <button class="w3-button mybbg w3-text-white"><?=lang('app.signup')?></button>
                    </a>
                  </div>
                </div>
</div>
</div>
</div>
</div> 

<?= $this->endSection() ?>