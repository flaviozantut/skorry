<?php
use Flaviozantut\Storage\Posts\PostRepositoryInterface;

class PostController extends \BaseController
{
    public function __construct(PostRepositoryInterface $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function articles()
    {
        $current = Input::get('page', 1) - 1;
        $articles = array_chunk($this->post->all('article'), Config::get('skorry.paginate'));
        if (!array_key_exists($current, $articles)) {
            App::abort(404);
        }
        $articles = $articles[$current];
        $paginator = Paginator::make($articles, count($this->post->all('article')), Config::get('skorry.paginate'));
        return View::make('posts.articles', compact('articles','paginator'));

    }

    public function get($type, $permalink)
    {
        $article = $this->post->find(['permalink'=>$permalink]);

        if ($article->type != $type) {
            App::abort(404);
        }
        return View::make('posts.post', compact('article'));

    }

}
