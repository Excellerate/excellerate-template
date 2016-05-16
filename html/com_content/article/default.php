<?php

    // Create shortcuts to some parameters.
    $params  = $this->item->params;
    $images  = json_decode($this->item->images);
    $urls    = json_decode($this->item->urls);
    $info    = $params->get('info_block_position', 0);

    // Break up the title
    if(preg_match("/ - /", $this->item->title)){
        $title = explode("-", $this->item->title, 2);
    }
    else{
        $title = array(
            $this->item->title 
        );
    }

    // Fix editor replaces <i> with <em>
    $text = preg_replace("/\<em class=\"(.*)\"\>(.*?)\<\/em\>/", "<i class=\"$1\"></i>", $this->item->text);

    // Convert and to "&"
    $title[0] = preg_replace("/ and|AND|And /", " &amp; ", $title[0]);

    // HEADING //
    print '<h1 class="ui header">' . trim($title[0]) . (isset($title[1]) ? '<div class="ui sub header">'.$title[1].'</div>' : null) . '</h1>';

    print JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above'));

    // Find image float, default to left
    $floated = ! empty( $images->float_fulltext ) ? $images->float_fulltext : 'right';

    // IMAGE (Left floated) //
    if( ! empty( $images->image_fulltext ) ){
        print '<a href="#" class="ui '.$floated.' floated image" style="width:100%;">';
            print '<img class="ui image" src="'.$images->image_fulltext.'" alt="'.$images->image_fulltext_alt.'" title="'.$images->image_fulltext_caption.'">';
        print '</a>';
    }

    // TEXT //
    print '<div>' . $text . '</div>';

?>

<?php //print "<pre>"; print_r($images); print "</pre>"; ?>