<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
//use Illuminate\Database\Eloquent\ModelNotFoundExeception;

class Post
{
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
