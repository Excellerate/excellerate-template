<?php 

	// Includ helper
	include JPATH_BASE . '/templates/excellerate/helper.php';

  // Create shortcuts to some parameters.
  $params     = $this->params;

?>

<div id="featured">
	<?php foreach($this->items as $item) : ?>
		<?php
			$this->item = $item;
			echo $this->loadTemplate('item');
		?>
	<?php endforeach; ?>

</div>