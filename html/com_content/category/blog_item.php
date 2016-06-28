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

<tr>
  <td class="four wide top aligned cell">
    <img class="ui fluid bordered image" src="<?= $images->image_intro; ?>" />
  </td>
  <td class="twelve wide top aligned cell">
    <h4 class="ui blog header">
      <?= $item->id; ?>
      <?= $title; ?>
      <div class="ui sub header"><i class="ui tiny calendar icon"></i><?= $date; ?></div>
    </h4>
    <p><?= $text; ?></p>
    <a href="<?= 't'; ?>" class="ui right labeled mini icon button"><i class="ui right arrow icon"></i>Read More</a>
  </td>
</tr>