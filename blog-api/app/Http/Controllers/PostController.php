<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'featured_image' => 'required|string',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'publication_date' => 'required|date',
        ]);

        return Post::create($validated);
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'featured_image' => 'sometimes|required|string',
            'author' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'publication_date' => 'sometimes|required|date',
        ]);

        $post->update($validated);
        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }
}
