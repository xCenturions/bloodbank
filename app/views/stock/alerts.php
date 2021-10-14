<?php $this->start('body') ?>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Alerts</h2>

    </div>
  </div>
</section>
<!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <center>
        <div class="col-lg-8 entries">

          <article class="entry">

            <?php if (alert(staff()->assigned)) : ?>

              <h3> Warning! Our Blood Bank <span style="color:red">
                  <?php foreach ($this->alert as $val) : ?>
                    <?= $val ?>, <?php endforeach; ?> </span> Blood Percentage on Low!</h3>
              <h3> Please Take An Action immediately!</h3>



              <div class="entry-content">


                <p style="text-align:left"><?= $this->date->date ?> / <?= $this->date->time ?></p>


                <div>
                  <button style="width:220px" type="button" class="btn btn-danger"><a style="color:white" href="blog-single.html">Request Blood From donors</a></button>
                  <button style="margin-left:100px;width:220px" type="button" class="btn btn-danger"><a style="color:white" href="blog-single.html">Request Blood From Nearest Blood banks</a></button>

                  <button style="margin-left:100px" type="submit" class="btn btn-outline-danger"><a href="<?= PROOT ?>stock/alertClose/<?= $this->date->bank ?>" style="color:black">Close This Alert</a></button>
                  </form>
                </div>
              </div>

            <?php else : ?>

              <h3> NO ALERTS </h3>

            <?php endif; ?>
          </article>

          <!-- End blog entry -->


          <!-- End blog sidebar -->
        </div>
      </center>
    </div>
</section>


<?php $this->end() ?>