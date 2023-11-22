<?php

class oaiptestOpenAIUrl
{
  public const ORIGIN = 'https://api.openai.com';
  public const API_VERSION = 'v1';
  public const API_URL = self::ORIGIN . "/" . self::API_VERSION;

  /**
   * @return string
   */
  public static function chatCompletionsURL(): string
  {
    return self::API_URL . "/chat/completions";
  }

  /**
   * @return string
   */
  public static function modelsURL(): string
  {
    return self::API_URL . "/models";
  }
}
