<?php $this->start('head'); ?>

<?php $this->end(); ?>
<?php $this->start('body'); ?>

<link href="<?= PROOT ?>css/home_lo.scss" rel="stylesheet">
<main class="page-content">
    <div class="card animate__animated animate__fadeInUp">
        <div class="content">
            <h2 class="title animate__animated animate__fadeInDown">Are You A Staff? </h2>
            <p class="copy">Check out all of these gorgeous mountain trips with beautiful views of, you guessed it, the mountains</p><a href="<?= PROOT ?>staff/login"><button class="btn">Login Here</button></a>
        </div>
    </div>
    <div class="card animate__animated animate__fadeInUp">
        <div class="content">
            <h2 class="title animate__animated animate__fadeInDown">Are You A Donor?</h2>
            <p class="copy">Check out all of these gorgeous mountain trips with beautiful views of, you guessed it, the mountains</p><a href="<?= PROOT ?>donor/login"><button class="btn">Login Here</button></a>
        </div>
    </div>

</main>

<?php $this->end() ?>