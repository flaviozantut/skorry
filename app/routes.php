<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

use Assetic\Factory\AssetFactory;
use Assetic\FilterManager;

use Assetic\Filter\LessphpFilter;

use Assetic\Filter\ScssphpFilter;
use Assetic\Filter\CssMinFilter;
use Assetic\Filter\CoffeeScriptFilter;
use Assetic\Filter\GoogleClosure\CompilerApiFilter;
use Assetic\Filter\PhpCssEmbedFilter;



View::composer('layouts._header', function($view) {
    $posts = App::make('Flaviozantut\Storage\Posts\PostRepositoryInterface');
    $view->with('pages', $posts->all('page'));
});


Route::group(array('before' => 'cache', 'after' => 'cache'), function()
{
    Route::get('/', 'PostController@articles');
    Route::get('/{type}/{permalink}','PostController@get')->where('type', 'article|page|draft');
});




Route::get('{args}',   array(function($args = null) {
    $filters = explode(',', Input::get('f'));
    $putLocation = public_path() . '/' . $args;

    $assets = explode('|', preg_replace_callback("/assets\/(.*)\.(css|js)/", function($matches){
        $t = explode('/', $matches[1]);
        return "$matches[1]/*." . Config::get('skorry.assets.types.' . $t[0]) . "|$t[0]|$matches[2]";
    }, $args));
    $files[] = $assets[0];
    $type =  $assets[1];
    $ext =  $assets[2];

    if (in_array($type, array('less','scss','coffee'))) {
        array_push($filters, $type);
    }

    if ($ext == 'js') {
        $type = 'text/javascript; charset=UTF-8';
        array_push($filters, '?js_min');
    } elseif ($ext == 'css') {
        $type = 'text/css; charset=UTF-8';
        array_push($filters, 'embed');
        array_push($filters, '?css_min');
    } else {
        App:abort(404);
    }
    $fm = new FilterManager(app_path(). "/assets/");
    $fm->set('less', new LessphpFilter());
    $fm->set('scss', new ScssphpFilter());
    $fm->set('embed', new PhpCssEmbedFilter());
    $fm->set('coffee', new CoffeeScriptFilter());
    $fm->set('css_min', new CssMinFilter());
    $fm->set('js_min', new CompilerApiFilter());

    $factory = new AssetFactory(app_path(). "/assets/");
    $factory->setFilterManager($fm);
    $factory->setDebug((App::environment()=='local') ? true : false);
    $content = $factory->createAsset($files, array_filter($filters));


    if (App::environment()!='local') {
        if (!File::isDirectory(dirname($putLocation))) {
            File::makeDirectory(dirname($putLocation), 0777, true);
        }
        File::put($putLocation, $content->dump());
        return Redirect::to($args);
    } else {
        File::deleteDirectory(public_path() . '/assets');
    }
    $response = Response::make($content->dump());
    $response->header('content-type', $type);
    return $response;


}))->where('args', 'assets/(.*)');
