<?php

/**
 * <div class="ui basic buttons">
  <div class="ui button">One</div>
  <div class="ui button">Two</div>
  <div class="ui button">Three</div>
</div>
 */

function pagination_list_render($list)
{
  $html = '<div class="ui basic buttons">';
  $html .= $list['start']['data'];
  
  foreach($list['pages'] as $page){
    $html .= $page['data'];
  }

  $html .= $list['previous']['data'];
  $html .= '</div>';

  return $html;
}

function pagination_item_active(&$item)
{
  return '<a title="' . $item->text . '" href="' . $item->link . '" class="ui button">' . $item->text . '</a>';
}

function pagination_item_inactive(&$item)
{
  return '<span title="' . $item->text . '" class="ui active button">' . $item->text . '</span>';
}
?>