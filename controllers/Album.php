<?php

namespace Controller;

class Album
{

  private $album;

  public function __construct()
  {
    $this->album = new \Models\Album();
  }

  public function index()
  {
    $album = $this->album->getAlbum($_GET['id']);

    require 'views/album.php';
  }
}
