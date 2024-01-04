    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Testimonials</h2>
          <p>Discover the experiences of those who've entrusted us with their financial journey. Our Happy Client section is a testament to the positive impact we've made in the lives of individuals and businesses. Read firsthand accounts of success stories, satisfaction, and the value our services bring. Join the community of satisfied clients who have found financial empowerment and success with Possible Loan Service Credit Union."</p>
        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <?php if(isset($all_testimonials)) : ?>
              <?php foreach($all_testimonials as $tsm) : ?>
                <div class="swiper-slide">
                  <div class="testimonial-wrap">
                    <div class="testimonial-item">
                      <div class="d-flex align-items-center">
                        <img src="<?=base_url('uploads/'.$tsm['customer_pic'])?>" class="testimonial-img flex-shrink-0" alt="">
                        <div>
                          <h3><?=$tsm['customer_name']?></h3>
                          <h4><?=$tsm['customer_title']?></h4>
                          <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                          </div>
                        </div>
                      </div>
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <?=$tsm['customer_testimoney']?>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
              <?php endforeach; ?>
            <?php endif; ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>