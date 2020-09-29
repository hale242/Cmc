<section class="vbox">
<header class="bg-dark dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="<?php echo e(url('admin/home')); ?>" class="navbar-brand"><?php echo e(SettingWeb::SettingWeb()->title_web); ?></a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
        </a>
      </div>

      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
        <!-- <li class="hidden-xs">
          <a href="#" class="dropdown-toggle dk" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
            <span class="badge badge-sm up bg-danger m-l-n-sm count">2</span>
          </a>
          <section class="dropdown-menu aside-xl">
            <section class="panel bg-white">
              <header class="panel-heading b-light bg-light">
                <strong>You have <span class="count">2</span> notifications</strong>
              </header>
              <div class="list-group list-group-alt animated fadeInRight">
                <a href="#" class="media list-group-item">
                  <span class="pull-left thumb-sm">
                    <img src="images/avatar.jpg" alt="John said" class="img-circle">
                  </span>
                  <span class="media-body block m-b-none">
                    Use awesome animate.css<br>
                    <small class="text-muted">10 minutes ago</small>
                  </span>
                </a>
                <a href="#" class="media list-group-item">
                  <span class="media-body block m-b-none">
                    1.0 initial released<br>
                    <small class="text-muted">1 hour ago</small>
                  </span>
                </a>
              </div>
              <footer class="panel-footer text-sm">
                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
              </footer>
            </section>
          </section>
        </li> -->
        <li class="hidden-xs">
          <a href="<?php echo e(url('/')); ?>" target="_blank" class="btn">เยี่ยมชมเว็บไซต์</a>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <?php if(session('session_admin_image')!=null): ?>
              
                <img src="<?php echo e(asset('upload/profile/'.$userinfo->image)); ?>">
              <?php else: ?>
                <img src="<?php echo e(asset('upload/profile/no-image.png')); ?>">
              <?php endif; ?>
            </span>
           <?php if(session('session_admin_username')!=null): ?><?php echo e(session('session_admin_username')); ?><?php endif; ?> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <span class="arrow top"></span>
            <li>
              <a href="<?php echo e(url('admin/profile/changeprofile')); ?>">Profile</a>
            </li>
            <li>
              <a href="<?php echo e(url('admin/profile/changepassword')); ?>">Change Password</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?php echo e(url('admin/logout')); ?>">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </header>
<?php /**PATH /home/cmcbiote/public_html/resources/views/layouts/admin/header.blade.php ENDPATH**/ ?>