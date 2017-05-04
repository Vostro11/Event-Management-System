<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use View;
class ComposerServiceProvider extends ServiceProvider
{
  /**
  * Bootstrap the application services.
  *
  * @return void
  */
  public function boot()
  {

    View::composer('*', function ($view) {
    $user = Auth::user();
    //return $user;
    $view->with('user', $user);
    });

    View::composer('*', function ($view) {
      $side_menus = array();
      if(Auth::user()['user_type']=='superAdmin'){
        $side_menus=array(
          ['name'=>'Dashboard','link'=>'admin/dashboard','icon'=>'fa-dashboard'],
          ['name'=>'Permission','link'=>'admin/permission','icon'=>'fa-circle-o'],
          ['name'=>'App','link'=>'app','icon'=>'fa-circle-o'],
          ['name'=>'Client','link'=>'client','icon'=>'fa-circle-o'],
          ['name'=>'Form','link'=>'form','icon'=>'fa-circle-o'],
          ['name'=>'Event','link'=>'event/view','icon'=>'fa-circle-o'],
          ['name'=>'Contact','link'=>'contact/view','icon'=>'fa-circle-o'],
          ['name'=>'Sms','link'=>'sms','icon'=>'fa-circle-o'],
          ['name'=>'Email','link'=>'email','icon'=>'fa-circle-o'],
        );
      }
      if(Auth::user()['user_type']=='client'){
        $side_menus=array(
          ['name'=>'Dashboard','link'=>'admin/dashboard','icon'=>'fa-dashboard'],
          ['name'=>'Client','link'=>'client','icon'=>'fa-circle-o'],
          ['name'=>'Form','link'=>'form','icon'=>'fa-circle-o'],
          ['name'=>'Event','link'=>'event/view','icon'=>'fa-circle-o'],
          ['name'=>'Contact','link'=>'contact/view','icon'=>'fa-circle-o'],
          ['name'=>'Sms','link'=>'sms','icon'=>'fa-circle-o'],
          ['name'=>'Email','link'=>'email','icon'=>'fa-circle-o'],
        );
      }
      $view->with('side_menus', $side_menus);
    });
  }
  /**
  * Register the application services.
  *
  * @return void
  */
  public function register()
  {
    //
  }
}