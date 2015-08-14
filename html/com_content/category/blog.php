
<div class="ui stackable grid">

    <!-- LEADING ARTICLE -->
    <?php if ( ! empty($this->lead_items)) : ?>            
        <?php foreach ($this->lead_items as &$item) : ?>
            <div class="ui sixteen wide column">
                <?php $this->item = & $item; print $this->loadTemplate('item'); ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- ARTICLES -->
    <?php if ( ! empty($this->intro_items)) : ?>
        <?php foreach ($this->intro_items as $key => &$item) : ?>
            <div class="ui sixteen wide column">
                <?php $this->item = & $item; print $this->loadTemplate('item'); ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?> 

</div>

<?php //print "<pre>"; print_r($this); print "</pre>"; ?>