<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use App\Events\PostWasUpdated;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');

        // $this->middleware('maintenance')->except('index', 'show');

        $this->middleware('can:update,post')->only('edit', 'update');
        $this->middleware('can:delete,post')->only('destroy');
    }

    public function index()
    {
        $posts = Post::with('user', 'category', 'tags');

        if (request('year')) {
            $posts = $posts->whereYear('created_at', request('year'));
        }

        if (request('month')) {
            $posts = $posts->whereMonth('created_at', Carbon::parse(request('month'))->month);
        }

        $posts = $posts->orderBy('created_at', 'desc')->paginate(15);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        if (request()->wantsJson() || request()->ajax()) {
            return $post;
        }

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create', compact('categories', 'tags'))->withPost(new Post);
    }

    public function store(PostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->validated());

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->validated());

        $post->tags()->sync($request->tags);

        event(new PostWasUpdated($post));

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
