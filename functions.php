<?php

$includes = array(
  'lib/utils.php',           // Utility functions
  'lib/init.php',            // Initial theme setup and constants
  'lib/vendor/wrapper.php',  // Theme wrapper class
  'lib/config.php',          // Configuration
  'lib/activation.php',      // Theme activation
  'lib/vendor/sidebar.php',  // Sidebar class
  'lib/vendor/gallery.php',  // Custom [gallery] modifications
  'lib/slides.php',					 // Slides Custom Post Type
  'lib/titles.php',          // Page titles
  'lib/options.php',         // Theme Options functions
  'lib/vendor/nav.php',      // Custom nav modifications
  'lib/scripts.php',         // Scripts and stylesheets
  'lib/extras.php',          // Custom functions
);

foreach ($includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
