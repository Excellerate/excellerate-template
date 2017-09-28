<?php
    // Row A to E
    if($cardA or $cardB or $cardC or $cardD or $cardE or $cardf){

        // Create the row grid
        $showAtoF = true;

        // Find the correct word count
        $count = count(array_filter(array($cardA, $cardB, $cardC, $cardD, $cardE, $cardF)));
        switch( $count ){
            case 1 : $use = "four"; break;
            case 2 : $use = "four"; break;
            case 3 : $use = "four"; break;
            case 4 : $use = "four"; break;
            case 5 : $use = "three"; break;
            case 6 : $use = "three"; break;
        }
    }

    else{
        $showAtoF = false;
    }

?>

<div class="ui <?= $use; ?> stackable cards">
  <jdoc:include type="modules" name="card_a" style="card" />
  <jdoc:include type="modules" name="card_b" style="card" />
  <jdoc:include type="modules" name="card_c" style="card" />
  <jdoc:include type="modules" name="card_d" style="card" />
  <jdoc:include type="modules" name="card_e" style="card" />
  <jdoc:include type="modules" name="card_f" style="card" />
</div>