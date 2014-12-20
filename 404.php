<?php get_template_part('templates/page', 'header'); ?>

<div class="alert alert-warning">
  <?php echo 'Sorry, but the page you were trying to view does not exist.'; ?>
</div>

<p><?php echo 'It looks like this was the result of either:'; ?></p>
<ul>
  <li><?php echo 'a mistyped address'; ?></li>
  <li><?php echo 'an out-of-date link'; ?></li>
</ul>

<?php get_search_form(); ?>
