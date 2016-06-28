<?php

class Excellerate
{
  public static function truncate($string, $your_desired_width) {

    $string = strip_tags($string);
    
    $string = preg_replace(array('/\s{2,}/', '/[\t\n]/', '/&nbsp;/'), ' ', $string);

    $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
    
    $parts_count = count($parts);

    $length = 0;
    $last_part = 0;
    for (; $last_part < $parts_count; ++$last_part) {
      $length += strlen($parts[$last_part]);
      if ($length > $your_desired_width) { break; }
    }

    return trim(implode(array_slice($parts, 0, $last_part))) . '&hellip;';
  }
}