<?php

namespace Models;

use Services\Spotify;

class Me
{

  private $spotify;

  public function __construct()
  {
    $this->spotify = new Spotify();
  }

  public function getProfile()
  {
    $res = $this->spotify->get("https://api.spotify.com/v1/me");
    return $res;
  }
}
