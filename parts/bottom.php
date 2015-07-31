<?php

    if($bottomA or $bottomB or $bottomC or $bottomD or $bottomE){

        // Create the row grid
        $show = true;

        // Find the correct word count
        $count = count(array_filter(array($bottomA, $bottomB, $bottomC, $bottomD, $bottomE)));
        switch( $count ){
            case 1 : $total = "one"; break;
            case 2 : $total = "two"; break;
            case 3 : $total = "three"; break;
            case 4 : $total = "four"; break;
            case 5 : $total = "five"; break;
        }
    }

    else{
        $show = false;
    }

?>

<?php if($show) : ?>
<div class="ui <?=$total; ?> column stackable grid">
    <?php if($bottomA) : ?><div class="column"><jdoc:include type="modules" name="bottom_a" style="none" /></div><?php endif; ?>
    <?php if($bottomB) : ?><div class="column"><jdoc:include type="modules" name="bottom_b" style="none" /></div><?php endif; ?>
    <?php if($bottomC) : ?><div class="column"><jdoc:include type="modules" name="bottom_c" style="none" /></div><?php endif; ?>
    <?php if($bottomD) : ?><div class="column"><jdoc:include type="modules" name="bottom_d" style="none" /></div><?php endif; ?>
    <?php if($bottomE) : ?><div class="column"><jdoc:include type="modules" name="bottom_e" style="none" /></div><?php endif; ?>
</div>
<?php endif; ?>