<?php

class oaiptestProvider
{
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }

  /**
   * @param string $url
   * @param string $method
   * @param array $opts
   * @return bool|string
   */
  public function sendRequest(string $url, string $method, array $opts = [], array $net_options = [], array $headers = [])
  {
    wa()->getStorage()->close();

    $net = new waNet($net_options, $headers);

    $response = $net->query($url, $opts, $method);

    $response['headers'] = $net->getResponseHeader();

    return $response;
  }
}
