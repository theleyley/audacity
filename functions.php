<?php

$includes = array(
	'lib/activation.php',
	'lib/cleanup.php',
	'lib/enqueue.php',
);

foreach ($includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
