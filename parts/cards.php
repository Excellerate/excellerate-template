<?php
    // Row A to E
    if($cardA or $cardB or $cardC or $cardD or $cardE or $cardF){

        // Create the row grid
        $showAtoF = true;

        // Find the correct word count
        $count = count(array_filter(array($cardA, $cardB, $cardC, $cardD, $cardE, $cardF)));
        switch( $count ){
            case 1 : $use = "centered"; $wide = 'four'; break;
            case 2 : $use = "centered"; $wide = 'four'; break;
            case 3 : $use = "centered"; $wide = 'four'; break;
            case 4 : $use = "four"; $wide = ''; break;
            case 5 : $use = "five"; $wide = ''; break;
            case 6 : $use = "three"; $wide = ''; break;
        }
    }

    else{
        $showAtoF = false;
    }

?>

<div class="ui <?= $use; ?> stackable cards">
  <?php if($cardA) : ?><div class="ui <?= $widel ?> card"><jdoc:include type="modules" name="card_a" style="card" /></div><?php endif; ?>
  <?php if($cardB) : ?><div class="ui <?= $widel ?> card"><jdoc:include type="modules" name="card_b" style="card" /></div><?php endif; ?>
  <?php if($cardC) : ?><div class="ui <?= $widel ?> card"><jdoc:include type="modules" name="card_c" style="card" /></div><?php endif; ?>
  <?php if($cardD) : ?><div class="ui <?= $widel ?> card"><jdoc:include type="modules" name="card_d" style="card" /></div><?php endif; ?>
  <?php if($cardE) : ?><div class="ui <?= $widel ?> card"><jdoc:include type="modules" name="card_e" style="card" /></div><?php endif; ?>
  <?php if($cardF) : ?><div class="ui <?= $widel ?> card"><jdoc:include type="modules" name="card_f" style="card" /></div><?php endif; ?>
</div>