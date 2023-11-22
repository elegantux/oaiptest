<?php

class oaiptestAPIError extends Exception {

  public function __construct($error_message = null, $status = 501, $error)
  {
    wa()->getResponse()->setStatus($status);

    $this->error_message = $error_message;
    $this->origin = $error;
    $this->status = $status;
    $this->datetime = date("M d Y H:i:s");

    waLog::dump(
      'OpenAi - IP Test Error',
      array(
        "error_message" => $this->error_message,
        "origin_error" => $this->origin,
        "datetime" => $this->datetime,
      ),
      'openai-test.log'
    );
  }

  public function __toString()
  {
    return json_encode($this);
  }

}
