<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->with('user', 'category', 'tags')->orderBy('created_at', 'desc')->paginate(15);

        return view('categories.show', compact('category', 'posts'));
    }
}
