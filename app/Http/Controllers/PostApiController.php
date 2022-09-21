<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index(){
        $categories = Category::all();
        $posts = Post::when(request('keyword'),function($q){
                            $keyword = request('keyword');
                            $q  ->where('title','like',"%$keyword%")
                                ->orWhere('description','like',"%$keyword%");
                        })
                        ->with(['user','category'])
                        ->latest('id')->paginate(45)->withQueryString();
        return response()->json([
            'categories' => $categories,
            'posts' => $posts
        ]);
    }
}
