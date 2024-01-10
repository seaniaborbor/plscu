<?php $this->extend('public/partials/layout')?>

<?=$this->section('main')?>

<?php 

$blog_to_read =$blog_to_read[0];
?>
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2><?=$blog_to_read->title?></h2>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li>blog-details/<?=$blog_to_read->id?></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->
<?php 
  //print_r($blog_to_read);
?>
    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                <img src="<?=base_url('uploads/'.$blog_to_read->featureImg)?>" alt="" class="img-fluid w-100">
              </div>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?=$blog_to_read->fullName ?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01"><?=$blog_to_read->createdAt?></time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
              <?php echo $blog_to_read->postbody ?>
             </div><!-- End post content -->

              <!-- <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div>End meta bottom --> 

            </article><!-- End blog post -->

            <div class="post-author d-flex align-items-center">
              <img src="/uploads/<?=$blog_to_read->profileImg?>" class="rounded-circle flex-shrink-0" alt="Author profile image">
              <div>
                <h4><?=$blog_to_read->fullName ?></h4>
                <div class="social-links">
                  <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                  <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                </div>
                <p>
                  Hi, I'm <?=$blog_to_read->fullName?> and I'm the author of this article you've just read.  At PLSCU, I'm <?=$blog_to_read->profession?>. Please support our platform by sharing this article. 
                </p>
              </div>
            </div><!-- End post author -->

            <div class="comments">

              <h4 class="comments-count"><?=count($post_comments)?> Comments</h4>

              <?php if(isset($post_comments)) : ?>
                <?php foreach($post_comments as $pst_cmts) : ?>
                   <div id="comment-1" class="comment">
                      <div class="d-flex">
                        <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
                        <div>
                          <h5><?=$pst_cmts['name']?></h5>
                          <time datetime="2020-01-01"><?=$pst_cmts['posted_at']?></time>
                          <?=$pst_cmts['comment']?>
                        </div>
                      </div>
                    </div><!-- End comment #1 -->
                <?php endforeach; ?>
              <?php endif; ?>

              

              <div class="reply-form">

                <h4><?php if(count($post_comments) == 0){echo "Be The First To ";}?>Leave a comment</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form method="post" action="<?=base_url('blog-details/'.$blog_to_read->id)?>">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*">
                      <?php if(isset($validation) && $validation->hasError('name')) : ?>
                         <div class="text-danger"><?=$validation->getError('name')?></div>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*">
                      <?php if(isset($validation) && $validation->hasError('email')) : ?>
                         <div class="text-danger"><?=$validation->getError('email')?></div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                      <?php if(isset($validation) && $validation->hasError('comment')) : ?>
                         <div class="text-danger"><?=$validation->getError('comment')?></div>
                      <?php endif; ?>
                    </div>
                  </div>
                      <input name="postId" type="hidden" value="<?=$blog_to_read->id?>" placeholder="Your Email*">
                  <button type="submit" class="btn btn-primary">Post Comment</button>

                </form>

              </div>

            </div><!-- End blog comments -->

          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="" class="mt-3">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <div class="sidebar-item categories">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="mt-3">
                  <?php if(isset($post_per_category)) :  ?>
                    <?php foreach($post_per_category as $ppc) : ?>
                      <li><a href="#"><?=$ppc->category?> <span><?=$ppc->total?></span></a></li>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </ul>
              </div><!-- End sidebar categories-->

              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Recent Posts</h3>

                <div class="mt-3">

                  <?php if(isset($recent_blogs)) : ?>
                  <?php foreach($recent_blogs as $rcnt_blg): ?>
                    <div class="post-item mt-3 w-100">
                    <img src="<?=base_url('uploads/'.$rcnt_blg['featureImg'])?>" alt="">
                    <div>
                      <h4><a href="/blog-details/<?=$rcnt_blg['id']?>"><?=$rcnt_blg['title']?></a></h4>
                      <time datetime="2020-01-01"><?=$rcnt_blg['createdAt']?></time>
                    </div>
                  </div><!-- End recent post item-->
                  <br><br>
                  <?php endforeach; ?>
                <?php endif;?>


                </div>

              </div><!-- End sidebar recent posts-->

            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->
   <?=$this->endSection()?>