<?php

namespace Services;

class OAuth2
{

  private $client;

  public function __construct()
  {
    $this->client = new HttpClient();
  }

  public function callback($code)
  {
    $url = "https://accounts.spotify.com/api/token";

    $body = [
      "code" => $code,
      "redirect_uri" => getenv('REDIRECT_URI'),
      "grant_type" => "authorization_code"
    ];

    $headers = ["Authorization: Basic " . base64_encode(getenv('CLIENT_ID') . ":" . getenv('CLIENT_SECRET'))];

    $res = $this->client->post($url, $body, $headers);

    return json_decode($res, true);
  }

  public function refresh($refreshToken)
  {
    $url = "https://accounts.spotify.com/api/token";

    $body = [
      "grant_type" => "refresh_token",
      "refresh_token" => $refreshToken,
    ];

    $headers = ["Authorization: Basic " . base64_encode(getenv('CLIENT_ID') . ":" . getenv('CLIENT_SECRET'))];

    $res = $this->client->post($url, $body, $headers);

    return json_decode($res, true);
  }
}
