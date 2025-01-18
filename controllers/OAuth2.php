<?php

namespace Controller;

class OAuth2
{

  private $OAuth2Service;

  public function __construct()
  {
    $this->OAuth2Service = new \Services\OAuth2();
  }

  public function callback()
  {
    if (!isset($_REQUEST['code'])) {
      http_response_code(400);
      echo "Ocurrió un problema durante la autenticación";
      return;
    }

    $callback = $this->OAuth2Service->callback($_REQUEST['code']);

    if (is_null($callback)) {
      http_response_code(400);
      echo "Error en la obtención del token";
      return;
    }

    $_SESSION['ACCESS_TOKEN'] = $callback['access_token'];
    $_SESSION['REFRESH_TOKEN'] = $callback['refresh_token'];

    header("Location: /home");
  }
}
