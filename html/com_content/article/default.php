<?php

    // Create shortcuts to some parameters.
    $params     = $this->item->params;
    $metadata   = $this->item->metadata;
    $images     = json_decode($this->item->images);
    $urls       = json_decode($this->item->urls);
    $info       = $params->get('info_block_position', 0);
    $reference  = $metadata->get('xreference', 0);

    // Break up the title
    if(preg_match("/ - /", $this->item->title)){
        $title = explode("-", $this->item->title, 2);
    }
    else{
        $title = array(
            $this->item->title 
        );
    }

    // JUST HACKING THIS IN FOR NOW (@todo Create blog view under articles) //
    if(
        in_array($this->item->category_title, array('blog', 'Myth-Busting Mondays', 'Tuesday Tips', 'Your World Wednesday'))
        or $params->get('show_title') == true
    ){

        // Find blog like things
        $title = $this->item->title;
        $date = $params->get('show_create_date') ? '<i class="ui calendar icon"></i>' . date('l, j F Y', strtotime($this->item->publish_up)) : false;
        $author = $params->get('show_author') ? 'By ' . $this->item->author : false;

        ?>
        <h1 class="ui blog header">
          <?= $title; ?>
          <div class="ui sub header">
            <?= implode(' | ', array_filter(array($date, $author))); ?>
          </div>
        </h1>
        <?php
    }

    // Find image properties
    $image = $images->image_fulltext ? : $images->image_intro;
    $alt = $images->image_fulltext_alt ? : $images->image_intro_alt;
    $caption = $images->image_fulltext_caption ? : $images->image_intro_caption;

    // Fix editor replaces <i> with <em>
    $text = preg_replace("/\<em class=\"(.*)\"\>(.*?)\<\/em\>/", "<i class=\"$1\"></i>", $this->item->text);

    // Convert and to "&"
    $title[0] = preg_replace("/ and|AND|And /", " &amp; ", $title[0]);

    // HEADING //
    if ($this->params->get('show_page_heading')){
        print '<h1 class="ui header">' . trim($title[0]) . (isset($title[1]) ? '<div class="ui sub header">'.$title[1].'</div>' : null) . '</h1>';
    }

    // Info block //
    print JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above'));

    // Find image float, default to left
    $floated = ! empty( $images->float_fulltext ) ? $images->float_fulltext : 'right';

    // IMAGE (Left floated) //
    if( ! empty( $image ) ){
        //print '<a href="#" class="ui '.$floated.' floated image" '.($floated=='none' ? 'style="width:100%;"' : null).'>';
            print '<img class="ui medium right floated image" src="'.$image.'" alt="'.$alt.'" title="'.$caption.'">';
        //print '</a>';
    }

    // TEXT //
    print '<article>' . $text . '</article>';

    // REFERENCE //
    if($reference){
        print '<a href="'.$reference.'" class="reference"><i class="ui external link icon"></i>'.(preg_replace("/http:\/\//", "", $reference)).'</a>';
    }
?>
<br>
<div class="addthis_sharing_toolbox"></div>
