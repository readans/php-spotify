<?php

namespace Models;

use Services\Spotify;

class Album
{
  private $spotify;

  public function __construct()
  {
    $this->spotify = new Spotify();
  }

  public function getAlbum($id)
  {
    $res = $this->spotify->get("https://api.spotify.com/v1/albums/" . $id);
    return $res;
  }

  public function getTracks($id)
  {
    $res = $this->spotify->get("https://api.spotify.com/v1/albums/" . $id . "/tracks");
    return $res;
  }

  public function newReleases()
  {
    $res = $this->spotify->get("https://api.spotify.com/v1/browse/new-releases");
    return $res;
  }
}
