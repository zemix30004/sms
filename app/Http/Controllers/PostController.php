<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $posts = Post::join('users', 'author_id', '=', 'users.id')
                ->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->orWhere('name', 'like', '%' . $request->search . '%')
                ->get();
            return view('posts.index', compact('posts'));
        }
        $posts = Post::join('users', 'author_id', '=', 'users.id')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(4);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->short_title = Str::length($request->title) > 30
            ? Str::substr($request->title, 0, 30) . '...' : $request->title;
        $post->description = $request->description;
        $post->author_id = \Auth::user()->id;
        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
            $post->image = $url;
        }
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Пост успешно создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::join('users', 'author_id', '=', 'users.id')
            ->find($id);

        if (!$post) {
            return redirect()->route('posts.index')->withErrors('Ты куда-то не туда пытался зайти!');
        }
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('posts.index')->withErrors('Ты куда-то не туда пытался зайти!');
        }
        if ($post->author_id != \Auth::user()->id) {
            return redirect()->route('posts.index')->withErrors('Вы не можете редактировать данный пост');
        }
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('posts.index')->withErrors('Ты куда-то не туда пытался зайти!');
        }

        if ($post->author_id != \Auth::user()->id) {
            return redirect()->route('posts.index')->withErrors('Вы не можете редактировать данный пост');
        }

        $post->title = $request->title;
        $post->short_title = Str::length($request->title) > 30
            ? Str::substr($request->title, 0, 30) . '...' : $request->title;
        $post->description = $request->description;
        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
            $post->image = $url;
        }
        $post->update();
        $id = $post->post_id;
        return redirect()->route('posts.show', compact('id'))->with('success', 'Пост успешно отредактирован!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('posts.index')->withErrors('Ты куда-то не туда пытался зайти!');
        }

        if ($post->author_id != \Auth::user()->id) {
            return redirect()->route('posts.index')->withErrors('Вы не можете редактировать данный пост');
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Пост успешно удален!');
    }
}
