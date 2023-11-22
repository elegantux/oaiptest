<?php

class oaiptestOpenAIProvider extends oaiptestProvider
{
  private $api_key = null;

  public function __construct($API_KEY)
  {
    $this->api_key = $API_KEY;
  }

  /**
   * @param $opts
   * @return bool|string
   */
  public function chatCompletion($opts = [])
  {
    $url = oaiptestOpenAIUrl::chatCompletionsURL();

    $opts["messages"] = array(
      [
        "role" => "system",
        "content" => "You are a helpful assistant."
      ],
      [
        "role" => "user",
        "content" => "Hello!"
      ]
    );
    $opts['model'] = 'gpt-3.5-turbo';
    $opts["top_p"] = 1;
    $opts["n"] = 1;
    $opts["stream"] = false;

    return $this->send($url, 'POST', $opts);
  }

  /**
   * @param $opts
   * @return bool|string
   */
  public function getModels($opts = [])
  {
    $url = oaiptestOpenAIUrl::modelsURL();

    return $this->send($url, 'GET');
  }

  /**
   * @param string $url
   * @param string $method
   * @param array $opts
   * @return bool|string
   */
  public function send(string $url, string $method, array $opts = [])
  {
    $net_options = [
      "format" => waNet::FORMAT_JSON,
      "timeout" => 100,
      "authorization" => true,
      "auth_type" => "Bearer",
      "auth_key" => $this->api_key,
    ];

    return $this->sendRequest($url, $method, $opts, $net_options);
  }
}
