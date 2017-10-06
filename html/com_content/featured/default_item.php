<?php

// Create shortcuts to some parameters.
$item    = $this->item;
$params  = $item->params;
$attribs = json_decode($item->attribs);
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$info    = $params->get('info_block_position', 0);

// Find blog like things
$title = $item->title;
$date = date('l, j F Y', strtotime($item->publish_up));
$text = Excellerate::truncate( ($item->fulltext) ? $item->fulltext : $item->introtext, 200);
?>

<!-- Image -->
<?php if( ! empty($images->image_intro)) : ?>
	<img class="ui fluid image" alt="<?= $images->image_intro_alt; ?>" src="<?= \JUri::base() . $images->image_intro; ?>" />
<?php endif; ?>

<!-- Text -->
<div class="section">

	<!-- Title -->
	<?php if($attribs->show_title != "0") : ?>
	<h2 class="ui header"><?= $this->item->title; ?></h2>
	<?php endif; ?>

	<?= $this->item->introtext; ?>

	<?php

		if($params->get('show_readmore') && $this->item->readmore){
			
			if($params->get('access-view')){
				$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
			}
			else{
				$menu = JFactory::getApplication()->getMenu();
				$active = $menu->getActive();
				$itemId = $active->id;
				$link = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
				$link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)));
			}

			// Print readmore link
			print '<a href="'.$link.'" class="ui right labeled icon submit small button">Read more&hellip;<i class="right arrow icon"></i></a>';
		}
	?>

</div>