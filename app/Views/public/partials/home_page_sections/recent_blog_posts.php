 <section id="recent-posts" class="recent-posts sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Recent Blog Posts</h2>
          <p>"Explore the PLSCU Blog – Your Source for Financial Insights and Empowerment. Delve into practical tips, success stories, and expert advice tailored to guide you on your journey to prosperity. Whether it's smart saving strategies, entrepreneurship inspiration, or the latest trends in financial literacy, our blog is your go-to resource for valuable information to empower your financial life."</p>
        </div>

        <div class="row gy-4">
          <?php if(isset($recent_blogs)) :?>

          <?php foreach($recent_blogs as $rcnt_blog) : ?>
            
          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="<?= base_url('uploads/'.$rcnt_blog->featureImg)?>" alt="" class="img-fluid w-100">
              </div>

              <p class="post-category"><?= substr($rcnt_blog->category, 0,25)?>...</p>

              <h2 class="title">
                <a href="<?=base_url('/blog-details/'.$rcnt_blog->blogId)?>"> <?= $rcnt_blog->title?></a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="<?=base_url('uploads/'.$rcnt_blog->profileImg)?>" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author"><?= $rcnt_blog->fullName?></p>
                  <p class="post-date">
                    <time datetime="2022-01-01"><?= $rcnt_blog->posted_date?></time>
                  </p>
                </div>
              </div>

            </article>
          </div>
        <?php endforeach; ?>
          <?php  endif; ?><!-- End post list item -->


        </div><!-- End recent posts list -->

      </div>
    </section>