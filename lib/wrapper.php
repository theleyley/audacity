<?php

// @link http://scribu.net/wordpress/theme-wrappers.html
function page_template() {
  return Page_Wrapper::$main_template;
}

function the_sidebar() {
  return new Page_Wrapper('templates/sidebar.php');
}

class Page_Wrapper {
  // Stores the full path to the main template file
  public static $main_template;

  // basename of template file
  public $slug;

  // array of templates
  public $templates;

  // Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
  static $base;

  public function __construct($template = 'base.php') {
    $this->slug = basename($template, '.php');
    $this->templates = array($template);

    if (self::$base) {
      $str = substr($template, 0, -4);
      array_unshift($this->templates, sprintf($str . '-%s.php', self::$base));
    }
  }

  public function __toString() {
    $this->templates = apply_filters('audacity/wrap_' . $this->slug, $this->templates);
    return locate_template($this->templates);
  }

  static function wrap($main) {
    // Check for other filters returning null
    if (!is_string($main)) {
      return $main;
    }

    self::$main_template = $main;
    self::$base = basename(self::$main_template, '.php');

    if (self::$base === 'index') {
      self::$base = false;
    }

    return new Page_Wrapper();
  }
}
add_filter('template_include', array('Page_Wrapper', 'wrap'), 99);
