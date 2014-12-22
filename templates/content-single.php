<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . 'Pages:', 'after' => '</p></nav>')); ?>
    </footer>
  </article>
<?php endwhile; ?>
