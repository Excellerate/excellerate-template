<?php

defined('JPATH_BASE') or die;

$blockPosition = $displayData['params']->get('info_block_position', 0);

	if ($displayData['position'] == 'above' && ($blockPosition == 0 || $blockPosition == 2) || $displayData['position'] == 'below' && ($blockPosition == 1)){

		if ($displayData['params']->get('show_author') && !empty($displayData['item']->author )){
			$spans[] = JLayoutHelper::render('joomla.content.info_block.author', $displayData);
		}

		if ($displayData['params']->get('show_parent_category') && !empty($displayData['item']->parent_slug)){
			$spans[] = JLayoutHelper::render('joomla.content.info_block.parent_category', $displayData);
		}

		if ($displayData['params']->get('show_category')){
			$spans[] = JLayoutHelper::render('joomla.content.info_block.category', $displayData);
		}

		if ($displayData['params']->get('show_publish_date')){
			$spans[] = JLayoutHelper::render('joomla.content.info_block.publish_date', $displayData);
		}
	}

	if ($displayData['position'] == 'above' && ($blockPosition == 0) || $displayData['position'] == 'below' && ($blockPosition == 1 || $blockPosition == 2)) {
		
		if ($displayData['params']->get('show_create_date')) {
			$spans[] = JLayoutHelper::render('joomla.content.info_block.create_date', $displayData);
		}

		if ($displayData['params']->get('show_modify_date')) {
			$spans[] = JLayoutHelper::render('joomla.content.info_block.modify_date', $displayData);
		}

		if ($displayData['params']->get('show_hits')) {
			$spans[] = JLayoutHelper::render('joomla.content.info_block.hits', $displayData);
		}
	
	}

?>

<?php if(isset($spans) and count($spans)) : ?>
<div class="articleDetails"><?php print implode(", ", array_filter($spans)); ?></div>
<?php endif; ?>