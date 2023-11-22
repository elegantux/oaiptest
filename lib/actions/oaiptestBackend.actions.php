<?php

class oaiptestBackendActions extends waActions
{

  public function oaiptestApiTestAction() {
    $API_KEY = waRequest::post('api_key');

    $openai = new oaiptestOpenAIProvider($API_KEY);

    try {
      $openai->getModels();

      $this->displayJson('ok');
    } catch (Exception $error) {
      $this->displayJson($error, $error->getMessage());
    }
  }

}
