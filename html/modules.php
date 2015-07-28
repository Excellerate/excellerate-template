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
