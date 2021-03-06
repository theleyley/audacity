<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php echo 'You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.'; ?>
    </div>
  <![endif]-->

  <div class="wrap container" role="document">
  	<?php
	    do_action('get_header');
	    get_template_part('templates/header');
			if(is_front_page()){
				get_template_part('templates/hero');
			}
		  if(is_front_page()) {
				get_template_part('templates/widgets');
			}else {
	  ?>
    <div class="content row">
  		<?php get_template_part('templates/page', 'header'); ?>
      <main class="main" role="main">
        <?php include page_template(); ?>
      </main><!-- /.main -->
      <?php if (display_sidebar()) : ?>
        <aside class="sidebar" role="complementary">
          <?php include the_sidebar(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
    <? } ?>
    
  <?php get_template_part('templates/footer'); ?>
  </div><!-- /.wrap -->


  <?php wp_footer(); ?>

</body>
</html>


