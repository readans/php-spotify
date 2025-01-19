<?php

namespace Services;

class Spotify
{

  private $client;
  private $oauth2;

  public function __construct()
  {
    $this->client = new HttpClient();
    $this->oauth2 = new OAuth2();
  }

  public function get($url)
  {
    $response = $this->client->get($url, [
      "Authorization: Bearer " . $_SESSION['ACCESS_TOKEN']
    ]);
    if ($response) return json_decode($response, true);

    $refresh = $this->oauth2->refresh($_SESSION['REFRESH_TOKEN']);

    if (!isset($refresh)) {
      http_response_code(400);
      echo "Error al refrescar token";
      return;
    }

    $_SESSION['ACCESS_TOKEN'] = $refresh['access_token'];
    if (isset($refresh['refresh_token'])) $_SESSION['REFRESH_TOKEN'] = $refresh['refresh_token'];

    $response = $this->client->get($url, [
      "Authorization: Bearer " . $_SESSION['ACCESS_TOKEN']
    ]);
    return json_decode($response, true);
  }

  public function post($url, $data)
  {
    $response = $this->client->post($url, $data, [
      "Authorization: Bearer " . $_SESSION['ACCESS_TOKEN']
    ]);
    if ($response) return json_decode($response, true);

    $refresh = $this->oauth2->refresh($_SESSION['REFRESH_TOKEN']);

    if (!isset($refresh)) {
      http_response_code(400);
      echo "Error al refrescar token";
      return;
    }

    $_SESSION['ACCESS_TOKEN'] = $refresh['access_token'];
    if (isset($refresh['refresh_token'])) $_SESSION['REFRESH_TOKEN'] = $refresh['refresh_token'];

    $response = $this->client->post($url, $data, [
      "Authorization: Bearer " . $_SESSION['ACCESS_TOKEN']
    ]);
    return json_decode($response, true);
  }
}
