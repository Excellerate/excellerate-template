<?php

    // Get a db connection.
    $db = JFactory::getDbo();

    // Create a new query object.
    $query = $db->getQuery(true);

    // Select all records
    $query->select(array('I.*', 'C.title AS category'));
    $query->from('`#__contact_details` I');
    $query->join('RIGHT', '`#__categories` C ON (C.id = I.catid)');
    $query->where('I.published = 1');
    $query->order('ordering ASC');

    // Reset the query using our newly populated query object.
    $db->setQuery($query);

    // Load the results as a list of stdClass objects (see later for more options on retrieving data).
    $results = $db->loadObjectList();

    foreach($results as $k => $result){
        $newResults[$result->category][] = $result;
    }

    // Loop result and build contacts list
    foreach($newResults as $category => $items){

        $contacts[] = '<h3>'.$category.'</h3>';

        foreach($items as $i => $item){
            $contacts[] = '<div class="segment">';
                $contacts[] = '<h4 class="ui header">'.$item->name.'<div class="ui sub header">' . $item->con_position.( ! empty($item->state) ? ',<br>'.$item->state : null) . '</div></h4>';
                $contacts[] = '<table><tbody><tr>';
                    $contacts[] = '<td class="contact profile">';
                        $contacts[] = !empty($item->image) ? '<img class="ui profile image" src="'.$item->image.'" alt="'.$item->name.'">' : null;
                    $contacts[] = '</td>';
                    $contacts[] = '<td>';
                        $contacts[] = '<div>'.$item->misc.'</div>';
                    $contacts[] = '</td>';
                $contacts[] = '</tr></tbody></table><br>';
            $contacts[] = '</div>';
            $contacts[] = '<br>';
        }
    }

?>

<div class="ui one column grid">
    <div class="ui column">
        <?= isset($contacts) ? implode($contacts) : 'No contacts set'; ?>
    </div>
</div>