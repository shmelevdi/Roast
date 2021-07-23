<?php 
namespace Roast\Controllers\Regular;
use Roast\App;
use Roast\Controller;
use Roast\Response;

class DefaultController extends Controller
{

   /**
    * welcome
    * @return void
    */
   public static function welcome()
   {
     return Response::JSON(App::Ver());
   }

}