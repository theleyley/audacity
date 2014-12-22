<?php


	register_widget('Display_Page_Widget');
/**
 * Display Page Widget
 */
class Display_Page_Widget extends WP_Widget {
  private $fields = array(
    'title'     => 'Title (optional)',
    'trim_num'	=> 'Number of words to display',
    'btn_text'	=> 'Button Text'
  );

  function __construct() {
    $widget_ops = array('classname' => 'widget_display_page', 'description' => 'Use this widget to display the contents of a page in a section');

    $this->WP_Widget('widget_display_page', 'Display Page', $widget_ops);
    $this->alt_option_name = 'widget_display_page';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('widget_display_page', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);
		
		global $post;
		$id = $instance['url'];
		$dest_id = $instance['btn_url'];
		$show_img = isset( $instance['show_img'] ) ? $instance['show_img'] : false;
		$current_page = $post->ID;
		$page = get_page($id);
		$content = apply_filters( 'the_content', $page->post_content );
		$contact_page = get_page($dest_id);
    $title = apply_filters('widget_title', empty($instance['title']) ? $page->post_title : $instance['title'], $instance, $this->id_base);
		$btn_text = isset( $instance['btn_text'] ) ? $instance['btn_text'] : 'Learn More';
		$trim_num = isset( $instance['trim_num'] ) ? $instance['trim_num'] : 11;
		
		
		 
    foreach($this->fields as $name => $label) {
      if (!isset($instance[$name])) { $instance[$name] = ''; }
    }
		
		
		if($id != $current_page) {
		
    echo $before_widget;
		
		
    if ($title) {
      echo $before_title, $title, $after_title;
    }
		if($id) {
  
	 if($show_img != false){ 
			echo get_the_post_thumbnail( $id, '', array('class' => 'img-responsive img-thumbnail alignleft') );
  	 } 
		if(!empty($page->post_excerpt)) {
			echo $page->post_excerpt;
		}else {
    	echo wp_trim_words($content, $trim_num, '');
    }
	?>
	<a href="<?php echo get_permalink($id); ?>" title="<?php echo $page->post_title; ?>" class="btn btn-xs btn-widget"><?php echo $btn_text ?> <span class="glyphicon glyphicon-play" aria-hidden="true"></span></a>
  <?php
		} //if $id
    echo $after_widget;
    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_display_page', $cache, 'widget');
		} // if $id != $current_page
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);
    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['widget_display_page'])) {
      delete_option('widget_display_page');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('widget_display_page', 'widget');
  }

  function form($instance) {
  	
    foreach($this->fields as $name => $label) {
      ${$name} = isset($instance[$name]) ? esc_attr($instance[$name]) : '';
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>"><?php echo "{$label}:"; ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id($name)); ?>" name="<?php echo esc_attr($this->get_field_name($name)); ?>" type="text" value="<?php echo ${$name}; ?>">
    </p>
    <?php
    }
		?>
		 <p>
      <label for="<?php echo $this->get_field_id('btn_url'); ?>"><?php _e('Page to link to:'); ?></label>
      <?php wp_dropdown_pages(array('id' => $this->get_field_id('btn_url'),'name' => $this->get_field_name('btn_url'), 'selected' => $instance['btn_url'])); ?>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Page to Display:'); ?></label>
      <?php wp_dropdown_pages(array('id' => $this->get_field_id('url'),'name' => $this->get_field_name('url'), 'selected' => $instance['url'])); ?>
    </p>
     <p>
        <input class="checkbox" type="checkbox" <?php checked( (bool) $instance['show_img'], true ); ?> id="<?php echo $this->get_field_id( 'show_img' ); ?>" name="<?php echo $this->get_field_name( 'show_img' ); ?>" /> 
        <label for="<?php echo $this->get_field_id( 'show_img' ); ?>">Display Featured Image</label>
    </p>
    
    <?php 
  }
}


