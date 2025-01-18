<?php

namespace Configuration;

abstract class Middleware
{
  abstract public function handle($request, $next);
}

class AuthMiddleware extends Middleware
{
  public function handle($request, $next)
  {
    if (!$this->isAuthenticated()) {
      header('Location: /');
      return;
    }

    return $next($request);
  }

  private function isAuthenticated()
  {
    return isset($_SESSION['ACCESS_TOKEN']);
  }
}

class LoginMiddleware extends Middleware
{
  public function handle($request, $next)
  {
    if ($this->isAuthenticated()) {
      header('Location: /home');
      return;
    }

    return $next($request);
  }

  private function isAuthenticated()
  {
    return isset($_SESSION['ACCESS_TOKEN']);
  }
}
