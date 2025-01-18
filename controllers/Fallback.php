<?php

namespace Controller;

class Fallback
{

  public function notFound()
  {
    require 'views/404.php';
  }
}
