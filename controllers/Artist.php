<?php

namespace Controller;

class Artist
{

  private $artist;

  public function __construct()
  {
    $this->artist = new \Models\Artist();
  }

  public function index()
  {
    $id = $_GET['id'];

    $artist = $this->artist->getArtist($id);
    $albums = $this->artist->getArtistAlbums($id);
    $topTracks = $this->artist->getArtistTopTracks($id)['tracks'];

    require 'views/artist.php';
  }
}
