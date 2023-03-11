<?php

namespace App\Helpers;

require('../lang/lang-' . LANG . '.php');
class Texter
{
  public static function cutText($text, $lg_max): string
  {
    if (mb_strlen((string) $text) > $lg_max) {
      $text = mb_substr((string) $text, 0, $lg_max);
      $last_space = mb_strrpos($text, " ");
      $text = mb_substr($text, 0, $last_space) . "...";
    }
    return $text;
  }

  const ACCENTS = [
    "&" => "&amp",
    "è" => "e"
  ];

  public static function replaceAccents(string $str): string
  {
    return str_replace(array_keys(self::ACCENTS), array_values(self::ACCENTS), $str);
  }

  public static function test_replace(string $day): string
  {
    global $lang;
    $arrayDays = ['&1', '&2', '&3', '&4', '&5', '&6', '&0'];
    $nameDays = [$lang['monday'] . ' ', $lang['tuesday'] . ' ', $lang['wednesday'] . ' ',  $lang['thursday'] . ' ', $lang['friday'] . ' ',  $lang['saturday'] . ' ', $lang['sunday']];

    return str_replace($arrayDays, $nameDays, $day);
  }
}
