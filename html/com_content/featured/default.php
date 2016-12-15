<?php include JPATH_BASE . '/templates/excellerate/helper.php'; ?>
<div id="featured">

<h2 class="ui dividing header">Featured Articles</h2>

<?php foreach($this->items as $item) : ?>
	<?php
			$this->item = &$item;
			echo $this->loadTemplate('item');
	?>
<?php endforeach; ?>
</div>