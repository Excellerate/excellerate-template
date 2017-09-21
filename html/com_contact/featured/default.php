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
                $contacts[$k][] = '<div class="ui segment">';
                    $contacts[$k][] = '<h4 class="ui header">'.$item->name.'<span class="ui sub header">' . $item->con_position.( ! empty($item->state) ? ',<br>'.$item->state : null) . '</span></h4>';
                    $contacts[$k][] = '<table><tbody><tr>';
                        $contacts[$k][] = '<td>';
                            $contacts[$k][] = !empty($item->image) ? '<img class="ui profile image" src="'.$item->image.'" alt="'.$item->name.'">' : null;
                        $contacts[$k][] = '</td>';
                        $contacts[$k][] = '<td>';
                            $contacts[$k][] = $item->misc;
                        $contacts[$k][] = '</td>';
                    $contacts[$k][] = '</tr></tbody></table><br>';
                $contacts[$k][] = '</div>';
            }
        }
    }
?>

<h1 class="ui header"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>

<div class="ui two column stackable equal grid">
    <div class="ui column">
        <?= (isset($contacts) and isset($contacts[0])) ? implode($contacts[0]) : 'No contacts set'; ?>
    </div>
    <div class="ui column">
        <?= (isset($contacts) and isset($contacts[1])) ? implode($contacts[1]) : null; ?>
    </div>
</div>