<!-- Left Column -->
<div class="ui stackable grid">

    <div class="row">
    
        <?php if($left) : ?>
        <div class="four wide column">
            <jdoc:include type="modules" name="left" style="block" />
        </div>
        <?php endif; ?>

            <!-- Center Column -->
            <?php
            if($left and $right) {
                print '<div class="eight wide column">';
            }
            else if($left or $right){
                print '<div class="twelve wide column">';
            }
            else if( ! $left and ! $right ){
                print '<div>';
            }  
            ?>
            
            <!-- Above content to the left and right -->
            <?php if($topLeft or $topRight) : ?>
            <div class="ui <?= ($topLeft and $topRight) ? "two" : "one"; ?> column stackable grid">
                <?php if($topLeft) : ?><div class="column"><jdoc:include type="modules" name="top_left" style="block" /></div><?php endif; ?>
                <?php if($topRight) : ?><div class="column"><jdoc:include type="modules" name="top_right" style="block" /></div><?php endif; ?>
            </div>
            <?php endif; ?>
            
            <!-- CONTENT -->
            <div class="ui one column grid">
                <div class="column">
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                    <?php if ($underContent) : ?>
                        <jdoc:include type="modules" name="under_content" style="block" />
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Below content to the left and right -->
            <?php if($bottomLeft or $bottomRight) : ?>
            <div class="ui <?= ($bottomLeft and $bottomRight) ? "two" : "one"; ?> column stackable grid">
                <?php if($bottomLeft) : ?><div class="column"><jdoc:include type="modules" name="bottom_left" style="block" /></div><?php endif; ?>
                <?php if($bottomRight) : ?><div class="column"><jdoc:include type="modules" name="bottom_right" style="block" /></div><?php endif; ?>
            </div>
            <?php endif; ?>
        </div>

        <!-- Right Column -->  
        <?php if($right) : ?> 
        <div class="four wide column">
            <jdoc:include type="modules" name="right" style="block" />
        </div>
        <?php endif; ?>

    </div>

</div>