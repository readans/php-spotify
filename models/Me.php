<?php

namespace Models;

use Services\HttpClient;

class Me
{
  private $client;

  public function __construct()
  {
    $this->client = new HttpClient();
  }

  public function getProfile()
  {
    $res = $this->client->get("https://api.spotify.com/v1/me", [
      "Authorization: Bearer " . $_SESSION['ACCESS_TOKEN']
    ]);

    return json_decode($res, true);
  }
}
