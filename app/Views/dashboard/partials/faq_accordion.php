 <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="content px-xl-5">
              <h3>Frequently Asked <strong>Questions</strong></h3>
              <p>
                On the right are the frequently questions asked about your business, services which you've answered. You can delete any one and add at any time!
              </p>
            </div>
          </div>

          <div class="col-lg-8">

            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

              <?php if(isset($all_faq) && !empty($all_faq)) : ?>
              <?php $counter = 1; ?>
                <?php foreach($all_faq as $fq) : ?>
                <div class="accordion-item">
                  <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?=$fq['id']?>">
                      <span class="num me-3 fw-bold"><?=$counter?></span>
                      <?=$fq['question']?>
                    </button>
                  </h3>
                  <div id="faq-content-<?=$fq['id']?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                      <?=$fq['answer']?>
                    </div>
                  </div>
                </div><!-- # Faq item-->
                <?php $counter++; ?>
                <?php endforeach; ?>
              <?php endif; ?>

            </div>

          </div>
        </div>

      </div>
    </section>