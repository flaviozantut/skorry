<?php

namespace Flaviozantut\Storage\Posts;

use Config;
use DOMDocument;
use Exception;
use File;
use Flaviozantut\Parser;
use StdClass;
use  Symfony\Component\Yaml\Yaml;

class FilePostRepository implements PostRepositoryInterface
{
    public $parser;
    public $directory;

    public function __construct($directory = null)
    {
        $this->parser = new Parser();
        $this->directory = $directory;
    }

    public function intro($post)
    {
        if (!$post) {
            return '';
        }
        $doc = new DOMDocument();
        $doc->loadHTML(mb_convert_encoding($post, 'HTML-ENTITIES', 'UTF-8'));

        /* Gets all the paragraphs */
        $p = $doc->getElementsByTagName('p');
        /* extracts the first one */

        if ($p->length > 0) {
            $p = $p->item(0);
        }

        /* returns the paragraph's content */

        return $p->textContent;
    }

    public function all($type = null)
    {
        $all = [];
        foreach (scandir($this->directory) as $file) {
            if (File::extension("{$this->directory}{$file}") != 'md') {
                continue;
            }
            $this->parser->parse(File::get("{$this->directory}{$file}"));

            if ($type and $type !=  $this->parser->metadata('type')) {
                continue;
            }
            $row = new StdClass();
            $row->id = $file;
            $row->post = $this->parser->content();

            $row->intro = $this->intro($row->post);
            $row->type = $this->parser->metadata('type');
            $row->title = $this->parser->metadata('title');
            $row->date = date(Config::get('skorry.date_format'), strtotime($this->parser->metadata('date')));
            $row->comments = $this->parser->metadata('comments');
            $row->external_url = $this->parser->metadata('external_url');
            $row->tags = $this->parser->metadata('tags');
            $row->permalink = $this->parser->metadata('permalink');
            array_push($all, $row);
        };
        usort($all, function ($a, $b) {
            return strtotime($b->date) - strtotime($a->date);
        });

        return $all;
    }

    public function find($condition)
    {
        if (!is_array($condition)) {
            $key = 'id';
            $value = $condition;
        } else {
            $key = key($condition);
            $value = $condition[$key];
        }
        foreach ($this->all() as $post) {
            if ($post->$key == $value) {
                return $post;
            }
        }

        return;
    }

    public function store($data)
    {
        if (!isset($data['title'])) {
            throw new Exception('Title not defined');
        }
        $post = [];
        $post['type'] = (isset($data['type']) and $data['type'] == 'page') ? $data['type'] : 'article';
        $post['title'] = $data['title'];
        $post['date'] = (isset($data['date']) and strtotime($data['date'])) ? date(Config::get('skorry.date_format'), strtotime($data['date'])) : date(Config::get('skorry.date_format'));
        $post['comments'] = isset($data['comments']) ? true : false;
        $post['external_url'] = isset($data['external_url']) ? $data['external_url'] : null;
        $post['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $post['permalink'] = \Str::slug($data['title'], '-');

        $mdFile = "{$this->parser->delimiter()}\n";
        $mdFile .= Yaml::dump($post);
        $mdFile .= "{$this->parser->delimiter()}\n";
        $mdFile .= isset($data['post']) ? $data['post'] : '';

        $filname = "{$this->directory}{$post['permalink']}.md";

        if (file_exists($filname)) {
            throw new Exception('This post already exists');
        }

        File::put($filname, $mdFile);

        return "Your post was created on: $filname";
    }

    public function update($name, $data)
    {
        $this->destroy($name);
        $this->store($data);

        return true;
    }

    public function destroy($name)
    {
        $file = "{$this->directory}{$name}";
        if (!File::exists($file)) {
            throw new Exception('This post not exists,'.$file);
        }
        File::delete($file);

        return true;
    }
}
