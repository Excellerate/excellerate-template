<?php
    // Row A to E
    if($bottomA or $bottomB or $bottomC or $bottomD or $bottomE or $bottomf){

        // Create the row grid
        $showAtoF = true;

        // Find the correct word count
        $count = count(array_filter(array($bottomA, $bottomB, $bottomC, $bottomD, $bottomE, $bottomF)));
        switch( $count ){
            case 1 : $total = "one"; break;
            case 2 : $total = "two"; break;
            case 3 : $total = "three"; break;
            case 4 : $total = "four"; break;
            case 5 : $total = "five"; break;
            case 6 : $total = "six"; break;
        }
    }

    else{
        $showAtoF = false;
    }

?>

<?php if($showAtoF) : ?>
<div class="ui <?=$total; ?> column stackable grid">
    <?php if($bottomA) : ?><div class="column"><jdoc:include type="modules" name="bottom_a" style="none" /></div><?php endif; ?>
    <?php if($bottomB) : ?><div class="column"><jdoc:include type="modules" name="bottom_b" style="none" /></div><?php endif; ?>
    <?php if($bottomC) : ?><div class="column"><jdoc:include type="modules" name="bottom_c" style="none" /></div><?php endif; ?>
    <?php if($bottomD) : ?><div class="column"><jdoc:include type="modules" name="bottom_d" style="none" /></div><?php endif; ?>
    <?php if($bottomE) : ?><div class="column"><jdoc:include type="modules" name="bottom_e" style="none" /></div><?php endif; ?>
    <?php if($bottomF) : ?><div class="column"><jdoc:include type="modules" name="bottom_f" style="none" /></div><?php endif; ?>
</div>
<?php endif; ?>

<?php

    // Row F to J
    if($bottomG or $bottomH or $bottomI or $bottomJ or $bottomK){

        // Create the row grid
        $showGtoK = true;

        // Find the correct word count
        $count = count(array_filter(array($bottomG, $bottomH, $bottomI, $bottomJ, $bottomK)));
        switch( $count ){
            case 1 : $total = "one"; break;
            case 2 : $total = "two"; break;
            case 3 : $total = "three"; break;
            case 4 : $total = "four"; break;
            case 5 : $total = "five"; break;
        }
    }

    else{
        $showGtoK = false;
    }
?>

<?php if($showGtoK) : ?>
<div class="ui <?=$total; ?> column stackable grid">
    <?php if($bottomG) : ?><div class="column"><jdoc:include type="modules" name="bottom_g" style="none" /></div><?php endif; ?>
    <?php if($bottomH) : ?><div class="column"><jdoc:include type="modules" name="bottom_h" style="none" /></div><?php endif; ?>
    <?php if($bottomI) : ?><div class="column"><jdoc:include type="modules" name="bottom_i" style="none" /></div><?php endif; ?>
    <?php if($bottomJ) : ?><div class="column"><jdoc:include type="modules" name="bottom_j" style="none" /></div><?php endif; ?>
    <?php if($bottomK) : ?><div class="column"><jdoc:include type="modules" name="bottom_j" style="none" /></div><?php endif; ?>
</div>
<?php endif; ?>