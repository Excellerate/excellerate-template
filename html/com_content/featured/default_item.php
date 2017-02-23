<?php

// Create shortcuts to some parameters.
$item    = $this->item;
$params  = $item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$info    = $params->get('info_block_position', 0);

// Find blog like things
$title = $item->title;
$date = date('l, j F Y', strtotime($item->publish_up));
$text = Excellerate::truncate( ($item->fulltext) ? $item->fulltext : $item->introtext, 200);
?>

<!-- Image -->
<?php if( ! empty($image->image_intro)) : ?>
<img class="ui fluid image" src="<?= $images->image_intro; ?>" />
<?php endif; ?>

<div class="section">
	
	<h1><?= $this->item->title; ?></h1>
	<?= $this->item->introtext; ?>

	<?php 
	if ($params->get('show_readmore') && $this->item->readmore) :
	if ($params->get('access-view')) :
		$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
	else :
		$menu = JFactory::getApplication()->getMenu();
		$active = $menu->getActive();
		$itemId = $active->id;
		$link = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
		$link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)));
	endif; ?>

	<?php //echo JLayoutHelper::render('joomla.content.readmore', array('item' => $this->item, 'params' => $params, 'link' => $link)); ?>

	<a href="<?= $link; ?>" class="ui right labeled icon submit small button">Read More<i class="right arrow icon"></i></a>

	<?php endif; ?>

</div>