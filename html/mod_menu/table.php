<?php

    // Split the menu into two cols
    $split = array_chunk($list, ceil(count($list) / 2));

    // Count the number of rows required
    $rows = count(current( $split ));
?>

<table class="ui very basic table">
<?php
    for ($i=0; $i < $rows; $i++) { 
        print implode(
            array(
                '<tr>',
                 '<td>'.(isset($split[0][$i]) ? '<i class="ui small circle icon"></i><a href="'.$split[0][$i]->flink.'">'.$split[0][$i]->title : '&nbsp;').'</a></td>',
                 '<td>'.(isset($split[1][$i]) ? '<i class="ui small circle icon"></i><a href="'.$split[1][$i]->flink.'">'.$split[1][$i]->title : '&nbsp;').'</a></td>',
                '</tr>'
            )
        );
    }
?>
</table>

