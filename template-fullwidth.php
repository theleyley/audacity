<?php
/*
Template Name: Full Width Page (No Sidebar)
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
