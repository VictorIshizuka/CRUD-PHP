<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create(Request $request) {
        $new_post = [
            'title' => 'Meu primeiro Post ',
            'content' => 'Conteúdo Qualquer',
            'author' => 'Alessandro'
        ];


        // Forma mais convencional de criar um registro no banco.
        $post = new Post($new_post);
        $post->save();
        return $post;
    }

    public function read(Request $r) {

        $post = new Post();

        $onePost = $post->find(2);

        return $onePost;
    }

    public function all(Request $r) {
        $posts = Post::all();

        return $posts;
    }

    public function update(Request $request) {
        $posts = Post::where('id', '>', 0)->update([
            'author' => 'Desconhecido'
        ]);

        // $post->title = 'Meu post atualizado';
        // $post->save();
        return $posts;
    }

    public function delete( Request $request) {

        $post = Post::where('id', '>', 0)->delete();

        return $post;
    }
}
