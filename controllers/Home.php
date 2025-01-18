<?php

namespace Controller;

use Models\Album;

class Home
{

  private $album;

  public function __construct()
  {
    $this->album = new Album();
  }

  public function index()
  {
    $newReleases = $this->album->newReleases();
    $albums = $newReleases['albums']['items'];

    require 'views/home.php';
  }
}
