<?php

    // Loop in items
    if($total = count($this->items)){

        // split into two for two columns
        if($total > 1){
            $pieces = array_chunk( $this->items, ceil($total / 2) );
        }
        else{
            $pieces[] = $this->items;
        }

        foreach($pieces as $k => $piece){
            foreach ($piece as $i => $item){
                //print "<pre>"; print_r($item); print "</pre>";
                $contacts[$k][] = '<div class="segment">';
                    $contacts[$k][] = '<table><tbody><tr>';
                        $contacts[$k][] = '<td>';
                            $contacts[$k][] = !empty($item->image) ? '<img class="ui profile image" src="'.$item->image.'" alt="'.$item->name.'">' : null;
                        $contacts[$k][] = '</td>';
                        $contacts[$k][] = '<td>';
                            $contacts[$k][] = '<h4 class="ui header">'.$item->name.'<div class="ui sub header">' . $item->con_position.( ! empty($item->state) ? ',<br>'.$item->state : null) . '</div></h4>';
                            $contacts[$k][] = '<p>'.$item->misc.'</p>';
                        $contacts[$k][] = '</td>';
                    $contacts[$k][] = '</tr></tbody></table><br>';
                $contacts[$k][] = '</div>';
            }
        }
    }
?>

<div class="ui two column grid">
    <div class="ui column">
        <?= (isset($contacts) and isset($contacts[0])) ? implode($contacts[0]) : 'No contacts set'; ?>
    </div>
    <div class="ui column">
        <?= (isset($contacts) and isset($contacts[1])) ? implode($contacts[1]) : null; ?>
    </div>
</div>