<?php

    // Create shortcuts to some parameters.
    $params  = $this->item->params;
    $images  = json_decode($this->item->images);
    $urls    = json_decode($this->item->urls);
    $info    = $params->get('info_block_position', 0);

    // Break up the title
    if(preg_match("/-/", $this->item->title)){
        $title = explode("-", $this->item->title, 2);
    }
    else{
        $title = array($this->item->title, $this->item->category_title);
    }

    // Fix editor replaces <i> with <em>
    $text = preg_replace("/\<em class=\"(.*)\"\>(.*?)\<\/em\>/", "<i class=\"$1\"></i>", $this->item->introtext);

    // HEADING //
    print '<h2 class="ui header">' . trim($title[0]) . (isset($title[1]) ? '<div class="ui sub header">'.$title[1].'</div>' : null) . '</h2>';

    //$params->get('show_publish_date') ? : null;

    //print JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above'));

    // IMAGE (Left floated) //
    if( ! empty( $images->image_intro ) ){
        print '<a href="" class="ui left floated small image">';
            print '<img src="'.$images->image_intro.'" alt="'.$images->image_intro_alt.'" title="'.$images->image_intro_caption.'">';
        print '</a>';
    }

    // TEXT //
    print $text;

    if ($params->get('show_readmore') && $this->item->readmore){
        print '<a class="readMore" href="'.JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)).'">Read the full article &hellip;</a>';
    }

?>