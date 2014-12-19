<footer class="footer container" role="contentinfo">
    <div class="col-sm-12">
      <!-- <img class="footer-logo" src="<?php echo get_template_directory_uri() ?>/assets/img/logos/footer-logo.png" alt="logo"> -->
      <?php 
      
      if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']))
			{
			    // if IE<=8
					echo '<span class="footer-logo"><img src="'.get_stylesheet_directory_uri().'/assets/img/logos/footer-logo.png" alt="SafeDecision" /></span>';
			}else 
			{
      	echo '<span class="footer-logo">'.logo_svg().'</span>'; 
			}
      ?>
      <p>
        SafeDecision.org is a new site for user reviews of prescription medications. The goal of the site is to provide valuable information to consumers.
      </p>
      <p class="copyright">&copy; <?php echo date('Y'); ?> SafeDecision</p>
    </div>
    
  <!-- <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div> -->
</footer>

<?php 
wp_footer();

echo (is_page(obu_get_option('thankyou_page'))) ? obu_get_option('thankyou_code') : ''; 
echo obu_get_option('footer_code');
?>