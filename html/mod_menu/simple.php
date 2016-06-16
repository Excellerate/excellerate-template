<?php

  // Regroup the menu and append empty submenu to each item
  foreach($list as $i => &$item){
    $list[$i]->subMenu = array();
  }

  // Regroup the menu and ilter out top level items
  foreach($list as $i => &$item){
    if($item->level == 1){
      $menu[$item->id] = $item;
    }
  }

  // Reloop and attach second level sub menus to top level menu items
  foreach($list as $i => &$item){
    if($item->level == 2){ // Check for level 2 entries
      $menu[$item->parent_id]->subMenu[$item->id] = $item;
    }
  }

  // Reloop and attach third level sub menus to second level menu items
  foreach($list as $i => &$item){
    if($item->level == 3){ // Check for level 3 entries
      $menu[$item->tree[0]]->subMenu[$item->tree[1]]->subMenu[$item->id] = $item;
    }
  }
?>

<?php

  // Open main menu
  foreach($menu as $item){

    if( ! IS_MOBILE) {

      // Find top active menu item
      if (($item->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id)){
        $active = 'active';
      }else{
        $active = false;
      }

      // Include menu anchor css
      $menuAnchorCss = $item->params->get('menu-anchor_css');

      // Top level
      print '<div class="ui ' . ( count($item->subMenu) ? ' simple dropdown ' : null ) . 'item">';

        // Top level href
        $topHref = ($item->type == 'alias' or $item->type == 'heading') ? false : 'href="'.$item->flink.'"';
      
        // Top level link
        print '<a class="'.$active.' '.$menuAnchorCss.'" '.$topHref.'>'.$item->title . ( count($item->subMenu) ? '&nbsp;&nbsp;&nbsp;<i class="ui dropdown icon"></i>' : null ).'</a>';

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
            print '<a href="'.$subItem->flink.'" '.($externalIcon ? "target=\"_blank\"" : null).' class="'.$active.'sub item'.( count($subItem->subMenu) ? ' strong' : null ).'">'.$subItem->title.$externalIcon.'</a>';

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

    // MOBILE MENU LIST //
    else{
      
      // One
      $topHref = ($item->type == 'alias' or $item->type == 'heading') ? false : true;
      
      if($topHref){
        print '<a href="'.$item->flink.'" class="item">'.$item->title.'</a>';
      }else{
        print '<span class="item">'.$item->title.'</span>';
      }

      // Two
      if( count($item->subMenu) ){
        print '<div class="menu">';
        foreach( $item->subMenu as $subItem ){
          print '<a href="'.$subItem->flink.'" class="item">'.$subItem->title.'</a>';

          // Three
          if(count($subItem->subMenu)){
            foreach( $subItem->subMenu as $subSubItem ){
              print '<a href="'.$subSubItem->flink.'" class="small item">'.$subSubItem->title.'</a>'; 
            }
          }
        }
        print '</div>';
      }
    }
  }
?>