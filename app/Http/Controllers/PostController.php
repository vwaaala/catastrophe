<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title_en' => 'required|string', 'description_en' => 'required|string', 'title_fr' => 'required|string', 'description_fr' => 'required|string']);

        $request->merge(input: [
            'title' => json_encode(['en' => $request->input('title_en'), 'fr' => $request->input('title_fr')]),
            'description' => json_encode(['en' => $request->input('description_en'), 'fr' => $request->input('description_fr')]),
        ]);
        // TODO remove static
        $request->merge(input: ['media' => '1']);
        Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        dump($post->id);

        $request->validate(['title_en' => 'required|string', 'description_en' => 'required|string', 'title_fr' => 'required|string', 'description_fr' => 'required|string']);

        $title = ['en' => $request->input('title_en'), 'fr' => $request->input('title_fr')];
        $description = ['en' => $request->input('title_en'), 'fr' => $request->input('title_fr')];
        $request->merge(input: ['title' => json_encode($title)]);
        $request->merge(input: ['description' => json_encode($description)]);
        // TODO remove static
        $request->merge(['media' => '1']);
        $post->update($request->only('title', 'description', 'media', 'status'));
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
