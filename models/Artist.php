<?php

namespace Models;

use Services\HttpClient;

class Artist
{
  private $client;

  public function __construct()
  {
    $this->client = new HttpClient();
  }

  public function getArtist($id)
  {
    $res = $this->client->get("https://api.spotify.com/v1/artists/" . $id, [
      "Authorization: Bearer " . $_SESSION['ACCESS_TOKEN']
    ]);

    return json_decode($res, true);
  }

  public function getArtistAlbums($id)
  {
    $res = $this->client->get("https://api.spotify.com/v1/artists/" . $id . "/albums", [
      "Authorization: Bearer " . $_SESSION['ACCESS_TOKEN']
    ]);

    return json_decode($res, true);
  }

  public function getArtistTopTracks($id)
  {
    $res = $this->client->get("https://api.spotify.com/v1/artists/" . $id . "/top-tracks", [
      "Authorization: Bearer " . $_SESSION['ACCESS_TOKEN']
    ]);

    return json_decode($res, true);
  }
}
