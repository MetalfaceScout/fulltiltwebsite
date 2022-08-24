<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
//use Illuminate\Database\Eloquent\ModelNotFoundExeception;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;

    public function __construct($title, $excerpt, $date, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }

    public static function all() {

        $files = File::files(resource_path("posts"));

        return array_map(function ($file) {
            $path = $file->getRelativePathname();
            return YamlFrontMatter::parseFile(resource_path("posts/{$path}"));
        }, $files); 

    }

    public static function find($slug) {

        $path = resource_path("posts/{$slug}.html");


        if (! file_exists($path)) {
                //throw new ModelNotFoundExeception();
            abort('404');
        }

        $post = cache()->remember("posts.{$slug}", 5, function () use ($path) {
            return file_get_contents($path);
        });

        return $post;

    }
    
}
