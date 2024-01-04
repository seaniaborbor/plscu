    <section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Services</h2>
          <p>
"Embark on a journey of transformative excellence as you explore our array of services at Hights Construction & Beautification, where innovation and craftsmanship converge to shape distinctive living spaces."</p>
        </div>

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

          <?php if(isset($all_services)) : ?>
            <?php if(!empty($all_services)): ?>

              <?php foreach ($all_services as $serv):?>
                <div class="col-lg-4 col-md-6">
                  <div class="service-item  position-relative">
                    <div class="icon">
                      <i class="bi <?=$serv['service_icon']?>"></i>
                    </div>
                    <h3><?=$serv['service_name']?></h3>
                    <p><?=$serv['service_summary']?></p>
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#read-more-<?=$serv['id']?>" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
                    <div id="read-more-<?=$serv['id']?>" class="collapse">
                    <div class="card-body">
                     <?=$serv['service_detail']?>
                    </div>
                  </div>
                  </div>

                </div><!-- End Service Item -->

              <?php endforeach;?>

            <?php endif;?>
          <?php endif; ?>

        </div>

      </div>
    </section>