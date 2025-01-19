<?php

namespace Models;

use Services\Spotify;

class Track
{
  private $spotify;

  public function __construct()
  {
    $this->spotify = new Spotify();
  }

  public function recommendations() {}
}
