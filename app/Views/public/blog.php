<?php $this->extend('public/partials/layout')?>

<?=$this->section('main')?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Blog</h2>
              <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4 posts-list">

          <?php if(isset($blog_posts)) : ?>
            <?php foreach($blog_posts as $bps) : ?>
                <div class="col-xl-4 col-md-6">
                  <article>

                    <div class="post-img">
                      <img src="<?=base_url('uploads/'.$bps['featureImg'])?>" alt="" class="img-fluid">
                    </div>

                    <p class="post-category"><?=$bps['category']?></p>

                    <h2 class="title">
                      <a href="/blog-details/<?=$bps['id']?>"><?=$bps['title']?></a>
                    </h2>

                    <div class="d-flex align-items-center">
                      <img src="<?=base_url('uploads/'.$bps['profileImg'])?>" alt="" class="img-fluid post-author-img flex-shrink-0">
                      <div class="post-meta">
                        <p class="post-author-list"><?=$bps['fullName']?></p>
                        <p class="post-date">
                          <time datetime="2022-01-01"><?=$bps['createdAt']?></time>
                        </p>
                      </div>
                    </div>

                  </article>
                </div><!-- End post list item -->
                <?php endforeach; ?>
            <?php endif; ?>


        <div class="blog-pagination">
          <ul class="justify-content-center">
            <?=$pager->links()?>
          </ul>
        </div><!-- End blog pagination -->

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
<?=$this->endSection()?>