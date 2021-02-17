<?php
  get_header();
?>
    <section class="home container text-white">
      <div class="row">
        <div class="col-md-6">
          <div class="hero-text">
            <span class="title">Hello, I'm</span><br />
            <span class="name">Greg Drake</span><br />
            <span class="designation">Certified Personal Trainer</span><br />
            <span class="email"
              ><i class="fa fa-envelope"></i> noreply@email.com</span
            ><br />
            <span class="phone"><i class="fa fa-phone"></i> (413) 244-1111</span
            ><br />
            <div class="social-icons d-flex">
              <li><i class="fa fa-facebook"></i></li>
              <li><i class="fa fa-twitter"></i></li>
              <li><i class="fa fa-linkedin"></i></li>
              <li><i class="fa fa-instagram"></i></li>
              <li><i class="fa fa-pinterest"></i></li>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="hero-img">
            <img src="images/t.png" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </section>
    <section class="home container text-white">
      <div class="row">
        <div class="col-md-6">
          <?php
            if( have_posts() ){
              while( have_posts ) {
                the_post();
              }
            }
          ?>
        </div>
      </div>
    <?php
      get_footer();
    ?>
