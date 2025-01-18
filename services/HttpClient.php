<?php

namespace Services;

class HttpClient
{
  public function get($url, $headers = [])
  {
    $options = [
      'http' => [
        'method'  => 'GET',
        'header'  => implode("\r\n", $headers)
      ]
    ];
    $context  = stream_context_create($options);
    $response = @file_get_contents($url, false, $context);
    return $response;
  }

  public function post($url, $data, $headers = [])
  {
    $options = [
      'http' => [
        'method'  => 'POST',
        'header'  => implode("\r\n", array_merge(["Content-type: application/x-www-form-urlencoded"], $headers)),
        'content' => http_build_query($data),
      ]
    ];
    $context  = stream_context_create($options);
    return @file_get_contents($url, false, $context);
  }
}
