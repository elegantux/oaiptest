<?php

class oaiptestHelper {

  const APP_ID = 'oaiptest';

  public static function hideApiCharacters($api_key) {
    if ($api_key_length = strlen($api_key)) {

      $filler = str_pad('', $api_key_length - 6, "*", STR_PAD_LEFT);

      preg_match('/(...)(.*)(...)/', $api_key, $matches);

      $result = str_replace($matches[2], $filler, $api_key);

      return $result;
    }

    return '';
  }

  public static function getConfigOption($key)
  {
    return wa(self::APP_ID)->getConfig()->getOption($key);
  }

  public static function hasRights()
  {
    return (bool) wa()->getUser()->getRights(self::APP_ID, 'backend');
  }

}
