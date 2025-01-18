<?php

namespace Services;

class OAuth2
{

  public function callback($code)
  {
    $url = "https://accounts.spotify.com/api/token";

    $client = new HttpClient();

    $body = [
      "code" => $code,
      "redirect_uri" => getenv('REDIRECT_URI'),
      "grant_type" => "authorization_code"
    ];

    $headers = ["Authorization: Basic " . base64_encode(getenv('CLIENT_ID') . ":" . getenv('CLIENT_SECRET'))];

    $res = $client->post($url, $body, $headers);

    return json_decode($res, true);
  }

  public function refresh($refreshToken)
  {
    $url = "https://accounts.spotify.com/api/token";

    $client = new HttpClient();

    $body = [
      "grant_type" => "refresh_token",
      "refresh_token" => $refreshToken,
    ];

    $headers = ["Authorization: Basic " . base64_encode(getenv('CLIENT_ID') . ":" . getenv('CLIENT_SECRET'))];

    $res = $client->post($url, $body, $headers);

    return json_decode($res, true);
  }
}
