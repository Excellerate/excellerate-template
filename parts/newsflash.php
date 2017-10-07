<?php

    if($newsFlashA or $newsFlashB or $newsFlashC or $newsFlashD or $newsFlashE){

        // Create the row grid
        $show = true;

        // Find the correct word count
        $count = count(array_filter([$newsFlashA, $newsFlashB, $newsFlashC, $newsFlashD, $newsFlashE]));
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
    <?php if($newsFlashA) : ?><div class="column"><jdoc:include type="modules" name="newsflash_a" style="block" /></div><?php endif; ?>
    <?php if($newsFlashB) : ?><div class="column"><jdoc:include type="modules" name="newsflash_b" style="none" /></div><?php endif; ?>
    <?php if($newsFlashC) : ?><div class="column"><jdoc:include type="modules" name="newsflash_c" style="block" /></div><?php endif; ?>
    <?php if($newsFlashD) : ?><div class="column"><jdoc:include type="modules" name="newsflash_d" style="none" /></div><?php endif; ?>
    <?php if($newsFlashE) : ?><div class="column"><jdoc:include type="modules" name="newsflash_e" style="block" /></div><?php endif; ?>
</div>

<?php endif; ?>