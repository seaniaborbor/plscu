<?php $this->extend('public/partials/layout')?>

<?=$this->section('main')?>
<main id="main">

    <section id="blog" class="blog">
      <div class="container">
        <div class="row py-5 rounded">
          <div class="col-md-6 h-100 ">
            <img src="https://cdni.iconscout.com/illustration/premium/thumb/login-3305943-2757111.png?f=webp" class="img-fluid w-100">
          </div>
          <div class="col-md-6 py-5">
            <div class="card border-0">
              <div class="card-body text-center">
                <h2 class="mb-5 ">Login To Continue</h2>
                  <form method="post" action="<?=base_url('/auth')?>">
                    <div class="form-group mb-4 text-center ">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control form-control-lg py-3 rounded-pill">
                    <?php if(isset($validation) && $validation->hasError('email')) : ?>
                       <div class="text-danger"><?=$validation->getError('email')?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-3 text-center">
                  <label>Password</label>
                  <input type="email" name="password" class="form-control form-control-lg py-3 rounded-pill">
                    <?php if(isset($validation) && $validation->hasError('password')) : ?>
                       <div class="text-danger"><?=$validation->getError('password')?></div>
                    <?php endif; ?>
                </div>
                <div class="text-center ">
                  <button class="btn rounded-pill text-white py-3 w-100 btn-lg" style="background: #008374 !important; " type="submit">Send Message</button>
                </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
<?=$this->endSection()?>