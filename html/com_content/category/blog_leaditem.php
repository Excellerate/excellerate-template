<?php

  // Create shortcuts to some parameters.
  $item = $this->item;
  $params  = $item->params;
  $images  = json_decode($this->item->images);
  $urls    = json_decode($this->item->urls);
  $info    = $params->get('info_block_position', 0);

  // Find blog like things
  $title = $item->title;
  $date = date('l, j F Y', strtotime($item->publish_up));
  $author = $item->author;
  $text = !empty($item->fulltext) ? $item->fulltext : $item->introtext;

  // Find images
  $images = json_decode($item->images);

  // Find alt text
  $alt = $images->image_fulltext_alt ? : $images->image_intro_alt;
?>

<h1 class="ui blog header">
  <?= $title; ?>
  <?php if($params->get('show_author')) : ?>
  <div class="ui sub header">
    <i class="ui calendar icon"></i><?= $date; ?> | By <?= $author; ?>
  </div>
  <?php endif; ?>
</h1>

<?php if($images->image_intro) : ?>
<img class="ui medium bordered right floated image" src="<?= $images->image_intro; ?>" alt="<?= $alt; ?>" />
<?php endif; ?>

<article>
  <?= $text; ?>
<article>

<div class="addthis_sharing_toolbox"></div>

<br>