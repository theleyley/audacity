<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
<?php echo obu_get_option('body_code'); ?>
  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
		
		if(is_front_page()) {
			get_template_part('templates/jumbotron');
		}elseif(is_page('user-reviews')) {
			get_template_part('templates/jumbotron-user-reviews');
		}elseif(is_page('add-review')) {
			get_template_part('templates/jumbotron-add-review');
		}else {
			get_template_part('templates/jumbotron-generic');
		}
  ?>
	
  <div class="wrap container" role="document">
      <main class="main <?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; 
			 ?>
      
      
  </div><!-- /.wrap -->

	<?php get_template_part('templates/footer'); ?>

</body>
</html>