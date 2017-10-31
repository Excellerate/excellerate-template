<?php

/*
 * Module chrome for rendering the module in a submenu
 */
function modChrome_flat($module, &$params, &$attribs)
{
    $moduleTag     = $params->get('module_tag', 'div');
    $bootstrapSize = (int) $params->get('bootstrap_size', 0);
    $moduleClass   = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';
    $headerTag     = htmlspecialchars($params->get('header_tag', 'h3'));
    $headerClass   = htmlspecialchars($params->get('header_class', 'page-header'));

    if ($module->content)
    {
        echo '<' . $moduleTag . ' class="' . htmlspecialchars($params->get('moduleclass_sfx')) . $moduleClass . '">';

            if ($module->showtitle)
            {
                echo '<' . $headerTag . ' class="ui header ' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
            }

            echo $module->content;
        echo '</' . $moduleTag . '>';
    }
}

function modChrome_block($module, &$params, &$attribs)
{
    $moduleTag     = $params->get('module_tag', 'div');
    $bootstrapSize = (int) $params->get('bootstrap_size', 0);
    $moduleClass   = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';
    $headerTag     = htmlspecialchars($params->get('header_tag', 'h3'));
    $headerClass   = htmlspecialchars($params->get('header_class', 'page-header'));

    if ($module->content)
    {
        echo '<' . $moduleTag . ' class="ui segment ' . htmlspecialchars($params->get('moduleclass_sfx')) . $moduleClass . '">';

            if ($module->showtitle)
            {
                echo '<' . $headerTag . ' class="ui header ' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
            }
            
            echo $module->content;
        echo '</' . $moduleTag . '>';
    }
}

function modChrome_card($module, &$params, &$attribs)
{
    if ($module->content){

        // Parms etc
        $moduleTag     = $params->get('module_tag', 'div');
        $bootstrapSize = (int) $params->get('bootstrap_size', 0);
        $moduleClass   = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';
        $headerTag     = htmlspecialchars($params->get('header_tag', 'h3'));
        $headerClass   = htmlspecialchars($params->get('header_class', 'page-header'));
        $img           = $params->get('backgroundimage');

        // Clean text
        $text = strip_tags($module->content);

        // Default to no link
        $links = [];

        // Find link if any
        $reg_exUrl = "/(http|https)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        if(preg_match($reg_exUrl, $text, $url)) {
            $text = preg_replace($reg_exUrl, "", $text);
            $links[] = $url[0];
        }

        $reg_exUrl3 = "/{{ ?other ?}}/";
        if(preg_match($reg_exUrl3, $text, $url)) {
            $text = preg_replace($reg_exUrl3, '', $text);
            $links['/excellerate-facility-management'] = 'Facility Management';
            $links['/excellerate-brand-management'] = 'Brand Management';
            $links['/precinct-management'] = 'Precinct Management';
            $links['/excellerate-utilities-management'] = 'Utilities Management';
            $links['/excellerate-infrastructure-management'] = 'Infrastructure Management';
        }
        else{
            $reg_exUrl2 = "/{{(.*)}}/";
            if(preg_match($reg_exUrl2, $text, $url)) {
                $text = preg_replace($reg_exUrl2, '', $text);
                $links[] = $url[1];
            }
        }

        $text = trim($text);

        ?>
        <div class="content">
            <?php if($img) : ?><img class="ui fluid image" src="<?= $img; ?>" ><?php endif; ?>
            <?= strlen($text) > 0 ? '<p>'.$text.'</p>' : null; ?>
        </div>
        <?php if(count($links)) : ?>
        <div class="extra content">
        <?php if(count($links) == 1) : ?>
            <a href="<?= $links[0]; ?>" class="ui small right labeled <?= $headerClass; ?> icon button"><i class="ui right arrow icon"></i> Learn more&hellip;</a>
        <?php else : ?>
            <div class="ui small vertical burgundy menu">
                <div class="ui simple dropdown item">
                    Learn more...
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <?php foreach($links as $link => $name) : ?>
                        <a href="<?= $link; ?>" class="item"><?= $name; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php
    }
}