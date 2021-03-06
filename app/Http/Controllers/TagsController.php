<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = Post::whereHas('tags', function ($query) use ($tag) {
            $query->where('tag_id', $tag->id);
        })->with('user', 'category', 'tags')->orderBy('created_at', 'desc')->paginate(15);

        // return $posts;

        return view('tags.show', compact('tag', 'posts'));
    }
}
