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
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts"))) //Use a collection, no ; cause the line isn't over
            ->map(fn($file) => YamlFrontMatter::parseFile($file)) // -> is basically a dot
            ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body
                ))
            ->sortByDesc('date'); //Map over a second time
        });
    }
        
    

    public static function find($slug) {
        return static::all()->firstWhere('slug', $slug);
    }
    
}
