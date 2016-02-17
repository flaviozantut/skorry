<?php

use Flaviozantut\Storage\Posts\PostRepositoryInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class PostMakeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'post:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new Post file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepositoryInterface $post)
    {
        parent::__construct();
        $this->post = $post;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $options = $this->option();
        $newPost = [];

        //POST TYPE
        $options['type'] = strtolower($options['type']);
        if ($options['type'] and ($options['type'] == 'article' or $options['type'] == 'page')) {
            $newPost['type'] = $options['type'];
        } else {
            $newPost['type'] = $this->ask("What's the post type? draft/article/page");
            if ($newPost['type'] != 'page' or $newPost['type'] != 'article') {
                $newPost['type'] = 'draft';
            }
        }
        //COMMENTS
        $options['comments'] = strtolower($options['comments']);
        if ($options['comments'] and ($options['comments'] == 'y' or $options['comments'] == 'n')) {
            $newPost['comments'] = $options['comments'];
        } else {
            $newPost['comments'] = $this->ask('Enable comments? y/n');
            if ($newPost['comments'] == 'n') {
                $newPost['comments'] = false;
            } else {
                $newPost['comments'] = true;
            }
        }
        //title
        if ($options['title']) {
            $newPost['title'] = $options['title'];
        } else {
            while (true) {
                $newPost['title'] = $this->ask("What's the title of post?");
                if ($newPost['title']) {
                    break;
                }
            }
        }

        if ($options['post']) {
            $newPost['post'] = $options['post'];
        } else {
            $newPost['post'] = $this->ask("What's the content of post?");
        }
        $this->info($this->post->store($newPost));
        $this->call('cache:clear');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['title', null, InputOption::VALUE_OPTIONAL, 'Title of post', null],
            ['type', null, InputOption::VALUE_OPTIONAL, 'article/page', null],
            ['comments', null, InputOption::VALUE_OPTIONAL, 'y/n', null],
            ['post', null, InputOption::VALUE_OPTIONAL, 'Content of post', null],
        ];
    }
}
