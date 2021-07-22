<?php 
namespace Roast\Controllers\Regular;
use Roast\App;
use Roast\Controller;
use Roast\Environment;
use Roast\ExceptionHandler;
use Roast\Headers;
use Roast\Response;

class DefaultController extends Controller
{

   /**
    * welcome
    * Главная страница фреймворка
    * @return void
    */
   public static function welcome()
   {
     return Response::JSON(App::Ver());
   }
}