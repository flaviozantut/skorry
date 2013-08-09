<?php
namespace Flaviozantut\Storage;

use Flaviozantut\Storage\Posts\FilePostRepository;
use Illuminate\Support\ServiceProvider;
use Config;

class StorageServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->bind(
        'Flaviozantut\Storage\Posts\PostRepositoryInterface',
        function() {
            switch (Config::get('skorry.storage')) {
                default:
                    return new FilePostRepository(Config::get('skorry.path'));
                    break;
            }
        }
    );
  }

}
