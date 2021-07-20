<?php if(currentUser()): ?>
    

 <?php if(currentUser()->acl == '["admin"]')
    $menu = Router::getMenu('admin_menu');
    $currentPage = currentPage(); 

    else :
      $menu = Router::getMenu('admin_menu');
    $currentPage = currentPage();

    
    ?>

<?php endif; ?>


<header id="header" class=" d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="<?=PROOT?>home">Blood Bank</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
            <?php foreach ($menu as $key => $val):
              $active = ''; ?>
            <?php if(is_array($val)): ?>
              <li class="dropdown"><a href="#"><span><?= $key?> </span> <i class="bi bi-chevron-down"></i></a>

                  <?php foreach($val as $k => $v):
                    $active = ($v == $currentPage)? 'active':''; ?>
                    <ul>
                  <li><a class="<?= $active ?>" href="<?= $v ?>"><?= $k ?></a></li>

                </ul>
                <?php endforeach; ?>
              </li>
            <?php else:
                  $active = ($val == $currentPage)? 'active':'';   ?>
                    <li><a class="<?= $active ?>" href="<?= $val ?>"><?= $key ?></a></li>
                    <!-- <li>
                    <?php if(currentUser()): ?>
                      <a  href="<?=PROOT?>donor/details">Hellow <?= currentUser()->donor_fname ?></a>
                    <?php endif;?>
                    </li> -->

            <?php endif; ?>
          <?php endforeach; ?>



        </ul>
        <!-- <i class="bi bi-list mobile-nav-toggle"></i>
        <li class="nav-item active"> -->
        <?php if(currentUser()): ?>
          <a  href="<?=PROOT?>donor/details">Hellow <?= currentUser()->donor_fname ?></a>
        <?php endif;?>
      </nav><!-- .navbar -->

    </div>
  </header>
