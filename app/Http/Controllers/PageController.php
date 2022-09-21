<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $posts = Post::when(request('keyword'),function($q){
                    $keyword = request('keyword');
                    $q  ->where('title','like',"%$keyword%")
                        ->orWhere('description','like',"%$keyword%");
                })
                ->with(['user','category'])
                ->latest('id')->paginate(5)->withQueryString();
        return view('index',compact('posts'));
    }

    public function detail($id){
        $post = Post::with(['category','user'])->findOrFail($id);
        return view('detail',compact('post'));
    }
}
