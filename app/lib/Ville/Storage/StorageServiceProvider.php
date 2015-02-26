<?php namespace Ville\Storage;
 
use Illuminate\Support\ServiceProvider;
 
class StorageServiceProvider extends ServiceProvider {
 
  public function register()
  {
    $this->app->bind(
      'Ville\Storage\User\UserRepository',
      'Ville\Storage\User\EloquentUserRepository'
    );
  }
 
}

?>