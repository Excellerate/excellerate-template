<?php 

	// Includ helper
	include JPATH_BASE . '/templates/excellerate/helper.php';

  // Create shortcuts to some parameters.
  $params     = $this->params;

?>

<div id="featured">

<?php if($params->get('show_page_heading') == 1) : ?>
<h2 class="ui dividing header">Featured Articles</h2>
<?php endif; ?>

<?php foreach($this->items as $item) : ?>
	<?php
			$this->item = &$item;
			echo $this->loadTemplate('item');
	?>
<?php endforeach; ?>
</div>