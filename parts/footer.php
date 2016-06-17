<?php

    if($footerA or $footerB or $footerC or $footerD or $footerE){

        // Create the row grid
        $show = true;

        // Find the correct word count
        $count = count(array_filter(array($footerA, $footerB, $footerC, $footerD, $footerE)));
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
<div class="ui <?=$total; ?> column stackable padded grid">
    <?php if($footerA) : ?><div class="column"><jdoc:include type="modules" name="footer_a" style="flat" /></div><?php endif; ?>
    <?php if($footerB) : ?><div class="column"><jdoc:include type="modules" name="footer_b" style="flat" /></div><?php endif; ?>
    <?php if($footerC) : ?><div class="column"><jdoc:include type="modules" name="footer_c" style="flat" /></div><?php endif; ?>
    <?php if($footerD) : ?><div class="column"><jdoc:include type="modules" name="footer_d" style="flat" /></div><?php endif; ?>
    <?php if($footerE) : ?><div class="column"><jdoc:include type="modules" name="footer_e" style="flat" /></div><?php endif; ?>
</div>
<?php endif; ?>