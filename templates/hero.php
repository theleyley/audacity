<?php
$i = 0;
$data_target = "hero-wrap";
$args = array('post_type' => 'slides');
$loop = new WP_Query($args);
$count = $loop->post_count;
$current_page_id = $post->ID;


?>
<div id="<?php echo $data_target; ?>" class="carousel slide" data-ride="carousel">
<?php 
if($count >= 2) { ?>
  <!-- Indicators -->
  <ol class="carousel-indicators">
  	<?php while ($loop->have_posts()) : $loop->the_post(); ?>
	    <li data-target="#<?php echo $data_target; ?>" data-slide-to="<?php echo $i++; ?>"></li>
    <?php endwhile; ?>
  </ol>
<?php } ?>
  <div class="carousel-inner" role="listbox">
    <?php 
		$i = 0;
    while ($loop->have_posts()) : $loop->the_post(); 
		$i++; 
		$active = ($i == 1) ? ' active' : ''; 
		$post_type = $post->post_type;
		
		$image_data = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), "full" );
		$image_width = $image_data[1];
		
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		
	?>
    <div class="item<?php echo $active; ?>">
      <?php the_post_thumbnail('full', array('class' => 'hidden-xxs img-responsive')); ?>
      <div class="carousel-caption">
				<?php 
					echo '<div class="text-wrap">';
					the_content(); 
					echo '</div>';
				?>
      </div><!--/carousel-caption-->
    </div><!--/item-->
    <?php endwhile; 
     wp_reset_postdata();
     ?>
  </div><!--/carousel-inner-->
<?php if($count >= 2) { ?>
  <!-- Controls -->
  <a class="left carousel-control" href="#<?php echo $data_target; ?>" role="button" data-slide="prev">
    <span class="icon-prev" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#<?php echo $data_target; ?>" role="button" data-slide="next">
    <span class="icon-next" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
<?php } ?>

</div><!--/hero-wrap-->
