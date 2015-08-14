<?php

    // Find header from module
    $item_heading = $params->get('item_heading', 'h4');
    $show_title = $params->get('show_title');

    // Loop
    foreach ($list as $key => $item){

        // Defaults and resets
        $title = false;
        $text = false;
        $image = false;
        $readMore = false;

        // Create shortcuts to some parameters.
        $params  = $item->params;
        $images  = json_decode($item->images);
        $urls    = json_decode($item->urls);
        $info    = $params->get('info_block_position', 0);

        // Set title
        if($show_title){
            $title = '<'.$item_heading . '>' . $item->title . '</' . $item_heading . '>';
        }

        // Set link
        $link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));

        //print "<pre>"; print_r($params); print "</pre>";

        // Fix editor replaces <i> with <em>
        $text = preg_replace("/\<em class=\"(.*)\"\>(.*?)\<\/em\>/", "<i class=\"$1\"></i>", $item->introtext);

        // IMAGE (Left floated) //
        if( ! empty( $images->image_intro ) ){
            $image = '<a href="" class="ui image">';
                $image .= '<img src="'.$images->image_intro.'" alt="'.$images->image_intro_alt.'" title="'.$images->image_intro_caption.'">';
            $image .= '</a>';
        }

        if ($params->get('show_readmore') && $item->readmore){
            $readMore = '<a class="readMore" href="'.$link.'">Read more about '.$item->title.' here.</a>';
        }

        $data[] = '<div class="ui six wide column">' . $image . '</div><div class="ui ten wide column">' . $title . $text . ($readMore ? $readMore : null) . '</div>';
    }
?>

<div class="ui grid">
    <?php foreach($data as $row) : ?>
        <div class="ui two column row">
            <?php print $row; ?>
        </div>
    <?php endforeach; ?>
</div>