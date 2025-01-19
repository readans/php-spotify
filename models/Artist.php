<?php

namespace Models;

use Services\Spotify;

class Artist
{
  private $spotify;

  public function __construct()
  {
    $this->spotify = new Spotify();
  }

  public function getArtist($id)
  {
    $res = $this->spotify->get("https://api.spotify.com/v1/artists/" . $id);
    return $res;
  }

  public function getArtistAlbums($id)
  {
    $res = $this->spotify->get("https://api.spotify.com/v1/artists/" . $id . "/albums");
    return $res;
  }

  public function getArtistTopTracks($id)
  {
    $res = $this->spotify->get("https://api.spotify.com/v1/artists/" . $id . "/top-tracks");
    return $res;
  }
}
