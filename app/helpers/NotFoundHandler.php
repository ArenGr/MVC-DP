<?php

namespace App\Helpers;

class NotFoundHandler
{

  public static function handle()
  {
      return self::notFound();
  }

  private static function notFound()
  {
      http_response_code(404);
      include(APP_ROOT.'/app/views/errors/404.php');
      exit;
  }
}
