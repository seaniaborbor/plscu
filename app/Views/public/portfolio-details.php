<?php $this->extend('public/partials/layout')?>

<?=$this->section('main')?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Portfolio Details</h2>
              <p><i><?=$portfolio_details['snippet']?>.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="<?=base_url()?>">Home</a></li>
            <li>portfolio-details/<?=$portfolio_details['id']?></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="position-relative h-100">
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="<?=base_url('uploads/'.$portfolio_details['shceenshoti'])?>" alt="">
              </div>

              <div class="swiper-slide">
                <img src="<?=base_url('uploads/'.$portfolio_details['shceenshotii'])?>" alt="">
              </div>

              <div class="swiper-slide">
                <img src="<?=base_url('uploads/'.$portfolio_details['shceenshotiii'])?>" alt="">
              </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8">
            <div class="portfolio-description">
              <h2><?=$portfolio_details['title']?></h2>
              <small> <i><?=$portfolio_details['snippet']?></i></small>
              <p><?=$portfolio_details['postbody']?></p>
            
            <!--   <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <div>
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                </div>
              </div> -->

            </div>
          </div>

          <div class="col-lg-3">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong> <span><?=$portfolio_details['category']?></span></li>
                <li><strong>Client</strong> <span><?=$portfolio_details['client']?></span></li>
                <li><strong>Project date</strong> <span><?=$portfolio_details['createdAt']?></span></li>
                <li><strong>Project URL</strong> <a href="<?=base_url('/portfolio-details/'.$portfolio_details['id'])?>"><?=base_url('/portfolio-details/'.$portfolio_details['id'])?></a></li>
                <li><a href="<?=base_url('/portfolio-details/'.$portfolio_details['id'])?>" class="btn-visit align-self-start">Visit Website</a></li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
<?=$this->endSection()?>