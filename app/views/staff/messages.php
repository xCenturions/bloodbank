 <?php $this->start('body');?>
 <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Messages</h2>
           
          </div>
        </div>
      </section>
      <!-- End Breadcrumbs -->

      <!-- ======= Blog Section ======= -->
      <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div class="col-lg-8 entries">
                  <?php foreach ($this->messages as $mes): ?>
              <article class="entry">
                
              
                <h3>
                  <a href="blog-single.html"
                    ><?= $mes->name ?></a
                  >
                </h2>

                <div class="entry-content">
                  <p>
                    <?= $mes->message ?>
                  </p>
                  <div>
                    <button  type="button" class="btn btn-outline-danger"><a href="blog-single.html">Reply</a></button>
                  </div>
                </div>
              </article>
                    <?php endforeach; ?>
              <!-- End blog entry -->

            
            <!-- End blog sidebar -->
          </div>
        </div>
      </section>
      <?php $this->end(); ?>