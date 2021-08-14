
    



<?php if(Session::exists(ADMIN_SESSION_NAME)):
    $menu = Router::getMenu('admin_acl');
    $currentPage = currentPage(); 
?>

<?php elseif(Session::exists(CURRENT_USER_SESSION_NAME)):
    $menu = Router::getMenu('menu_acl');
    $currentPage = currentPage(); 
?>
<?php elseif(Session::exists(STAFF_SESSION_NAME)):
    $menu = Router::getMenu('staff_menu');
    $currentPage = currentPage(); 
?>
<?php else:
   $menu = Router::getMenu('menu_acl');
    $currentPage = currentPage(); 
?>

<?php endif; ?>

 




<header id="header" class=" d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="<?=PROOT?>home"><img src="<?=PROOT?>img/blood1.jpg" alt="" class="img-fluid">Blood Bank</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="<?=PROOT?>home" class="logo me-auto"></a> -->

      <nav id="navbar" class="navbar">
        <ul>
            <?php foreach ($menu as $key => $val):
              $active = ''; ?>
            <?php if(is_array($val)): ?>
              <li class="dropdown"><a href="#"><span><?= $key?> </span> <i class="bi bi-chevron-down"></i></a>
                  <ul >
                  <?php foreach($val as $k => $v):
                    $active = ($v == $currentPage)? 'active':''; ?>
                    
                  <li><a class="<?= $active ?>" href="<?= $v ?>"><?= $k ?></a></li>

               
                <?php endforeach; ?>
                 </ul>
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
     
         <?php if(staff()): ?>

          <?php if( countMessage() == null) : ?>
             <a  href="<?=PROOT?>staff/messages">Messages</a>
             <?php else :?>
          <a  href="<?=PROOT?>staff/messages">
            <div class="notification-box">
    <span class="notification-count"><?=  countMessage()?></span>
    <div class="notification-bell">
      <span class="bell-top"></span>
      <span class="bell-middle"></span>
      <span class="bell-bottom"></span>
      <span class="bell-rad"></span>
    </div>
  </div>
  <?php endif; ?>
          </a>
        <?php endif;?>
        <!-- <i class="bi bi-list mobile-nav-toggle"></i>
        <li class="nav-item active"> -->
        <?php if(currentUser()): ?>
          <a  href="<?=PROOT?>donor/details">Hellow <?= currentUser()->donor_fname ?></a>
        <?php endif;?>
      </nav><!-- .navbar -->

    </div>
  </header>
