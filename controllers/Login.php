<?php

namespace Controller;

class Login
{

  public function index()
  {
    require 'views/login.php';
  }

  public function logout()
  {
    session_destroy();
    header('Location: /');
  }
}
