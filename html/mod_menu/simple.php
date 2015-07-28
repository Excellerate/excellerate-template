<?php

    // Load vendors
    include 'vendor/autoload.php';

    //print "<pre>"; print_r($list); print "</pre>"; die();

    // Regroup the menu
    foreach($list as $i => &$item){

        // Append empty submenu to each item
        $list[$i]->subMenu = array();
    }

    // Regroup the menu
    foreach($list as $i => &$item){

        // Filter out top level items
        if($item->level == 1){
            $menu[$item->id] = $item;
        }
    }

    // Reloop and attach second level sub menus to top level menu items
    foreach($list as $i => &$item){

        // Check for level 2 entries
        if($item->level == 2){
            $menu[$item->parent_id]->subMenu[$item->id] = $item;
        }
    }

    // Reloop and attach third level sub menus to second level menu items
    foreach($list as $i => &$item){

        // Check for level 3 entries
        if($item->level == 3){
            $menu[$item->tree[0]]->subMenu[$item->tree[1]]->subMenu[$item->id] = $item;
        }
    }

?>

<nav>
    <div class="ui menu">

        <?php

            // Open main menu
            foreach($menu as $item){

                // Find top active menu item
                if (($item->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id)){
                    $active = 'active';
                }else{
                    $active = false;
                }

                // Top level
                print '<div class="ui ' . ( count($item->subMenu) ? 'simple dropdown ' : null ) . 'item">';
                
                    // Top level link
                    print '<a class="'.$active.'" href="'.$item->flink.'">'.$item->title . ( count($item->subMenu) ? '&nbsp;&nbsp;&nbsp;<i class="ui dropdown icon"></i>' : null ).'</a>';

                    // Check for second dropdown level
                    if( count($item->subMenu) ){

                        // Open submenu dropdown
                        print '<div class="sub menu">';

                        // Build submenu dropdown
                        foreach( $item->subMenu as $subItem ){

                            // Find second level active menu item
                            if (($subItem->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id)){
                                $active = 'active ';
                            }else{
                                $active = false;
                            }

                            // Second level type
                            $externalIcon = $subItem->type == 'url' ? '&nbsp;<i class="angle double right icon"></i>' : '';
                            
                            // Second level link
                            print '<a href="'.$subItem->flink.'" class="'.$active.'sub item'.( count($subItem->subMenu) ? ' strong' : null ).'">'.$subItem->title.$externalIcon.'</a>';

                            // Check for third level
                            if( count($subItem->subMenu) ){

                                // List thrid level items under each other
                                foreach($subItem->subMenu as $subSubItem){

                                    // Find third active menu item
                                    if (($subSubItem->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id)){
                                        $active = 'active ';
                                    }else{
                                        $active = false;
                                    }

                                    print '<a href="'.$subSubItem->flink.'" class="'.$active.'subsub item">'.$subSubItem->title.'</a>';
                                }
                            }
                        }

                        // Close submenu dropdown
                        print '</div>';
                    }

                // Close main menu
                print '</div>';
            }

        ?>

    </div>
</nav>