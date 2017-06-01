<?php

    if($topA or $topB or $topC or $topD or $topE){

        // Create the row grid
        $show = true;

        // Find the correct word count
        $count = count(array_filter(array($topA, $topB, $topC, $topD, $topE)));
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
    <?php if($topA) : ?><div class="column"><jdoc:include type="modules" name="top_a" style="none" /></div><?php endif; ?>
    <?php if($topB) : ?><div class="column"><jdoc:include type="modules" name="top_b" style="none" /></div><?php endif; ?>
    <?php if($topC) : ?><div class="column"><jdoc:include type="modules" name="top_c" style="none" /></div><?php endif; ?>
    <?php if($topD) : ?><div class="column"><jdoc:include type="modules" name="top_d" style="none" /></div><?php endif; ?>
    <?php if($topE) : ?><div class="column"><jdoc:include type="modules" name="top_e" style="none" /></div><?php endif; ?>
</div>
<?php endif; ?>