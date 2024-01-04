<section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Team</h2>
          <p>
"Meet the driving force behind PLSCU's success – our exceptional team. Committed to your financial well-being, our dedicated professionals bring expertise, passion, and a collaborative spirit to ensure you receive top-notch service and guidance on your financial journey."</p>
        </div>

        <div class="row gy-4">

          <?php if(isset($all_team)) : ?>
            <?php 
              function social_link($x)
              {
                if(!empty($x)) 
                {
                  echo $x;
                }else{
                  echo "#";
                }
              }
            ?>
            <?php foreach($all_team as $al_tm) : ?>
              <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="member w-100">
                  <img src="<?=base_url('uploads/'.$al_tm['profileImg'])?>" class="img-fluid w-100" alt="">
                  <h4><?=$al_tm['fullName']?></h4>
                  <span><?=$al_tm['profession']?></span>
                  <div class="social">
                    <a href="<?php  social_link($al_tm['xHandle']); ?>"><i class="bi bi-twitter"></i></a>
                    <a href="<?php  social_link($al_tm['fbHandle']); ?>"><i class="bi bi-facebook"></i></a>
                    <a href="<?php  social_link($al_tm['linkinHandle']); ?>"><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            <?php endforeach;  ?>
          <?php endif; ?><!-- End Team Member -->

          </div>

          <!-- End Team Member -->

        </div>

      </div>
    </section>