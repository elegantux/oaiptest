<?php

class oaiptestBackendActions extends waActions
{

  public function oaiptestApiTestAction() {
    $openai = new oaiptestOpenAIProvider('');

    try {
      $openai->getModels();

      $this->displayJson('ok');
    } catch (Exception $error) {
      $this->displayJson($error, $error->getMessage());
    }
  }

}
