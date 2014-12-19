<header class="navbar navbar-default navbar-fixed-top" role="banner">
  <div class="container page-scroll">
  	
     <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <!-- <a class="navbar-brand main-logo navbar-left" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> -->
      
      <a class="navbar-brand main-logo navbar-left" href="<?php echo home_url(); ?>/"><?php echo logo_svg(); ?></a>
      
    </div><!--/navbar-header-->

     <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav navbar-text navbar-right'));
        endif;
      ?>
    </nav> 
    
    <!-- Navbar -->
        <!-- <a class="main-logo navbar-left" href="#home">SafeDecision</a>
        <p class="navbar-text navbar-right">
          <span class="hidden-xs">
            Already invited? <a class="btn btn-default" href="#">Sign in</a>
          </span>
          <a href="#" class="btn btn-default btn-lg visible-xs">
            <i class="fa fa-sign-in"></i>
          </a>
        </p> -->
    
  </div>
</header>