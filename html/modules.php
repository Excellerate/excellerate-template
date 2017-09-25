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

        // Find link if any
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        if(preg_match($reg_exUrl, $text, $url)) {
            $text = preg_replace($reg_exUrl, "", $text);
            $link = $url[0];
        }else{
            $link = false;
        }

        ?>
        <div class="ui card">
            <div class="content">
                <?php if($img) : ?><img class="ui image" src="<?= $img; ?>" ><?php endif; ?>
                <h3><?= $module->title; ?></h3>
                <p><?= $text ?></p>
            </div>
            <?php if($link) : ?>
            <div class="extra content">
                <a href="<?= $link; ?>" class="ui mini right labeled <?= $headerClass; ?> icon button"><i class="ui right arrow icon"></i> Learn more...</a>
            </div>
            <?php endif; ?>
        </div>
        <?php
    }
}
