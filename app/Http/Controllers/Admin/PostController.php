<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\Store;
use App\Http\Requests\Admin\Post\Update;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Blog\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::with(['category'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $data = $request->validated();
        // dd($data);
        $tags = $data['tags'];
        unset($data['tags']);

        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('images',  $data['image']);
        }

        // dd($data);

        $post = Post::firstOrCreate($data);
        $post->tags()->attach($tags);

        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Post $post)
    {
        $data = $request->validated();

        $tags = $data['tags'];
        unset($data['tags']);

        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('images',  $data['image']);
        }

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('admin.posts.index'));
    }
}
