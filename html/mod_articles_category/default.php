<?php

    // Find header from module
    $item_heading = $params->get('item_heading', 'h5');
    $show_title = $params->get('show_title');

    foreach ($list as $item){

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

        // Set atributes
        $date = JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC3'));
        $link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));

        // Break up the title
        if(preg_match("/ - /", $item->title)){
            $title = explode("-", $item->title, 2);
        }
        else{
            $title = array($item->title, $item->category_title);
        }

        // Set title
        $data[] = '<'.$item_heading . ' class="ui header"><a href="'.$link.'">' . $title[0] . '</a><div class="ui sub header">' . $date . '</div></' . $item_heading . '></a>';

        //print "<pre>"; print_r($params); print "</pre>";

    }

    print implode($data);

?>