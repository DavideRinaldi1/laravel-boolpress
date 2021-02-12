<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostInfo;
use App\Category;
use App\Tag;
use App\Http\Requests\PostFormRequest;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        //$info = $posts[0]->postInfo;
        return view('welcome', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if(Auth::check()){
            return view('create', compact('categories', 'tags'));
        }else{
            return view('notPermission');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $validated = $request->validated();
        $newPost = new Post();
        $newPost->title = $validated['title'];
        $newPost->author = $validated['author'];
        $newPost->category_id = $validated['category_id'];
        $newPost->user_id = Auth::user()->id;
        $newPost->save();

        $newPostInfo = new PostInfo();
        $newPostInfo->post_id = $newPost->id;
        $newPostInfo->description = $validated['description'];
        $newPostInfo->slug = $validated['slug'];
        $newPostInfo->save();


        return redirect(route('posts.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('details', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::find($id);
        $postInfo = PostInfo::find($id);
        if(Auth::check()){
            return view('edit', compact('post', 'tags', 'categories', 'postInfo'));
        }else{
            return view('notPermission');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $id)
    {
        $validated = $request->validated();

        $oldPost = Post::find($id);
        $oldPost->title = $validated['title'];
        $oldPost->author = $validated['author'];
        $oldPost->category_id = $validated['category_id'];
        $oldPost->save();

        $oldPostInfo = $oldPost->postInfo;
        $oldPostInfo->description = $validated['description'];
        $oldPostInfo->slug = $validated['slug'];
        $oldPostInfo->save();

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check()){
            $posts = Post::find($id);
            //$posts->tags()->touch();
            $posts->category->touch();
            $posts->postInfo->delete();
            $posts->delete();
    
            return redirect(route('posts.index'));
        }else{
            return view('notPermission');
        }
    }
}
