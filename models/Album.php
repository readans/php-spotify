<?php

namespace Models;

use Services\HttpClient;

class Album
{
  private $client;

  public function __construct()
  {
    $this->client = new HttpClient();
  }

  public function newReleases()
  {
    $res = $this->client->get("https://api.spotify.com/v1/browse/new-releases", [
      "Authorization: Bearer " . $_SESSION['ACCESS_TOKEN']
    ]);

    return json_decode($res, true);
  }
}
