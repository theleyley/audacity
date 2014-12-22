<div class="widgets-home row">
<?php

if(is_active_sidebar('home-1')) {
	echo '<div class="col-sm-6 col-md-3 widget-area">';
	dynamic_sidebar('home-1');
	echo '</div>';
}

if(is_active_sidebar('home-2')) {
	echo '<div class="col-sm-6 col-md-3 widget-area">';
	dynamic_sidebar('home-2');
	echo '</div>';
}


if(is_active_sidebar('home-3')) {
	echo '<div class="col-sm-6 col-md-3 widget-area">';
	dynamic_sidebar('home-3');
	echo '</div>';
}


if(is_active_sidebar('home-4')) {
	echo '<div class="col-sm-6 col-md-3 widget-area">';
	dynamic_sidebar('home-4');
	echo '</div>';
}
?>
</div>
<div class="display-pages row">
<?php

if(is_active_sidebar('home-5')) {
	echo '<div class="col-sm-12 col-md-6">';
	dynamic_sidebar('home-5');
	echo '</div>';
}

if(is_active_sidebar('home-6')) {
	echo '<div class="col-sm-12 col-md-6 widget-area">';
	dynamic_sidebar('home-6');
	echo '</div>';
}
?>
</div>
