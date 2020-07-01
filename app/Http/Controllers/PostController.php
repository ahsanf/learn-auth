<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        if (auth()->user()->id != $user_id) {
            abort(403);
        }
        $user = User::findOrFail($user_id);

        return view('users.posts.create', compact('user'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        if (auth()->user()->id != $user_id) {
            abort(403);
        }
        $this->validate($request, [
            'story' => 'required|string'
        ]);

        $user = User::findOrFail($user_id);
        $post = new Post;
        $post->story = $request->story;
        $user->posts()->save($post);

        return redirect()->route('users.show', [ $user_id ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $user_id)
    {
        if (auth()->user()->id != $user_id) {
            abort(403);
        }
        $user = User::findOrFail($user_id);
        $post = $user->posts()->findOrFail($id);

        return view('users.posts.edit', compact('user', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $user_id)
    {
        if (auth()->user()->id != $user_id) {
            abort(403);
        }
        $this->validate($request, [
            'story' => 'string'
        ]);

        $user = User::findOrFail($user_id);
        $post = $user->posts()->findOrFail($id);
        $post->user_id = $user_id;
        $post->story = $request->story;
        $post->save();

        return redirect()->route('users.show', [ $user_id ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $user_id)
    {
        if (auth()->user()->id != $user_id) {
            abort(403);
        }
        $user = User::findOrFail($user_id);
        $post = $user->posts()->findOrFail($id);
        $post->delete();

        return redirect()->route('users.show', [ $user_id ]);

    }
}
