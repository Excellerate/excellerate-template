<?php

defined('_JEXEC') or die;

$q = parse_url(Juri::current());
if($q['path'] != "/media-articles/blog"){
    print '<div><a href="'.JUri::base().'media-articles/blog"><i class="ui left chevron icon"></i><strong>Back to main blog</strong></a></div><br>';
}

foreach ($list as $item) : ?>
    <div <?php if ($_SERVER['REQUEST_URI'] == JRoute::_(ContentHelperRoute::getCategoryRoute($item->id))) echo ' class="active"';?>> <?php $levelup = $item->level - $startLevel - 1; ?>
        <h<?php echo $params->get('item_heading') + $levelup; ?>>
        <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>">
        <?php echo $item->title;?>
            <?php if ($params->get('numitems')) : ?>
                (<?php echo $item->numitems; ?>)
            <?php endif; ?>
        </a>
        </h<?php echo $params->get('item_heading') + $levelup; ?>>

        <?php if ($params->get('show_description', 0)) : ?>
            <?php echo JHtml::_('content.prepare', $item->description, $item->getParams(), 'mod_articles_categories.content'); ?>
        <?php endif; ?>
        <?php if ($params->get('show_children', 0) && (($params->get('maxlevel', 0) == 0)
            || ($params->get('maxlevel') >= ($item->level - $startLevel)))
            && count($item->getChildren())) : ?>
            <?php echo '<ul>'; ?>
            <?php $temp = $list; ?>
            <?php $list = $item->getChildren(); ?>
            <?php require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default') . '_items'); ?>
            <?php $list = $temp; ?>
            <?php echo '</ul>'; ?>
        <?php endif; ?>
    </div>
<?php endforeach; ?>