<?php include JPATH_BASE . '/templates/excellerate/helper.php'; ?>
<div id="featured">
<?php foreach($this->items as $item) : ?>
	<?php
			$this->item = &$item;
			echo $this->loadTemplate('item');
	?>
<?php endforeach; ?>
</div>