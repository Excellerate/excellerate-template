<?php include JPATH_BASE . '/templates/excellerate/helper.php'; ?>

<div class="ui stackable grid">

    <!-- LEADING ARTICLE -->
    <?php if ( ! empty($this->lead_items)) : ?>            
        <?php foreach ($this->lead_items as &$item) : ?>
            <div class="ui sixteen wide column">
                <?php $this->item = & $item; print $this->loadTemplate('leaditem'); ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- ARTICLES -->
    <?php if ( ! empty($this->intro_items)) : ?>
        <div class="ui sixteen wide column">
            <h3>Previous Posts</h3>
            <table class="ui very basic table">
            <?php foreach ($this->intro_items as $key => &$item) : ?>
                <?php $this->item = & $item; print $this->loadTemplate('item'); ?>
            <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?> 

</div>

<div class="pagination">
    <?php echo $this->pagination->getPagesLinks(); ?>
</div>