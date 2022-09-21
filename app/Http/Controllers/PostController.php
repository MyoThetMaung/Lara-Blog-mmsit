<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::when(request('keyword'),function($q){
                            $keyword = request('keyword');
                            $q  ->where('title','like',"%$keyword%")
                                ->orWhere('description','like',"%$keyword%");
                        })
                        ->with(['user','category'])
                        ->latest('id')->paginate(45)->withQueryString();
        return view('post.index',compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create',compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description,50,' ...');
        $post->category_id = $request->category;
        $post->user_id = Auth::id();

        //featured image uploading
        if ($request->hasFile('featured_image')) {
            $file = $request->featured_image;
            $newName = uniqid().'.'.$file->extension();
            $path = $file->storeAs('public', $newName);

            $post->featured_image = $newName;
        }
        $post->save();

        //photo uploading
        foreach($request->photos as $photo){
            $newName = uniqid().'post_photo'.$photo->extension();
            $photo->storeAs('public',$newName);
            
            $photo = new Image();
            $photo->post_id = $post->id;
            $photo->name = $newName;
            $photo->save();
        }
        return redirect()->route('post.index')->with('message',$post->title.' is successfully created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Gate::authorize('view',$post);
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        Gate::authorize('edit',$post);
        $categories = Category::all();
        return view('post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //using policy
        Gate::authorize('update',$post);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description,50,' ...');
        $post->category_id = $request->category;
        $post->user_id = Auth::id();
        //featured image update
        if ($request->hasFile('featured_image')) {
            //delete old file
            Storage::delete("public/".$post->featured_image);
            //update file
            $file = $request->featured_image;
            $newName = uniqid().'.'.$file->extension();
            $path = $file->storeAs('public', $newName);

            $post->featured_image = $newName;
        }
        $post->update();
        //photos update
         foreach($request->photos as $photo){
            $newName = uniqid().'post_photo'.$photo->extension();
            $photo->storeAs('public',$newName);
            $photo = new Image();
            $photo->post_id = $post->id;
            $photo->name = $newName;
            $photo->save();
        }
        return redirect()->route('post.index')->with('message',$post->title.' is successfully created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //using policy
        Gate::authorize('delete',$post);
        if(isset($post->featured_image)){
            Storage::delete('public/'.$post->featured_image);
        }
        foreach($post->photos as $photo){
            Storage::delete('public/'.$photo->name);
            $photo->delete();
        }
        $post->delete();
        return redirect()->route('post.index')->with('message',$post->title.' is successfully created');
    }
}