<?php
namespace RewindRadio;
class Text {

public static function cutText($text, $lg_max) {
    if (mb_strlen((string) $text) > $lg_max) {
        $text = mb_substr((string) $text, 0, $lg_max);
        $last_space = mb_strrpos($text, " ");
        $text = mb_substr($text, 0, $last_space) . "...";
    }
    echo $text;
}

/**
* Start a replace accents function.
*
* string $str is the sentence.
*/

public static function replaceAccents($str) {
  $accents = ["&", "è"];
  $letters = ["&amp", "e"];
  return str_replace($accents, $letters, (string) $str);
}

public static function test_replace($day) {
  $lang = [];
  include(RESSOURCES_PATH . 'lang/lang-' . LANG . '.php');
  $arrayDays = ['&1', '&2', '&3', '&4', '&5', '&6', '&0'];
  $nameDays = [$lang['monday'] . ' ', $lang['tuesday'] . ' ', $lang['wednesday'] . ' ',  $lang['thursday'] . ' ', $lang['friday'] . ' ',  $lang['saturday'] . ' ', $lang['sunday']];

  $days = str_replace($arrayDays, $nameDays, (string) $day);
  return $days;
}


} // End of Text Class
