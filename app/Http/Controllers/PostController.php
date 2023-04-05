<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::withTags(Post::all());
    }

    /**
     * Display resources tagged by the requested tags.
     */
    public function taggedBy(Request $request)
    {
        $rules = [
            'tags'   => 'required|array|max:10|min:1',
            'tags.*' => 'string|max:100|min:1',
        ];
        $request->validate($rules);
        return Post::withTags(Post::taggedBy($request->tags));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());
        return Post::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->rules());
        $post->update($request->validated());
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return $post;
    }

    /**
     * Get the validation rules.
     *
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author' => 'required|string|max:50',
            'title'  => 'required|string|max:100',
            'body'   => 'required|string|max:2000',
        ];
    }
}
