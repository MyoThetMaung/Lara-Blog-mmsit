@extends('layouts.app')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="ms-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Post</li>
    </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>{{ $post->title }}</h4>
                    <hr>
                    <div class="mb-3">
                        <span class="badge bg-secondary">
                            {{ $post->category->title }}
                        </span>
                        <span class="badge bg-secondary">
                            {{ $post->user->name }}
                        </span>
                    </div>
                    <p>{{ $post->description }}</p>
                    @isset($post->featured_image)
                        <div class="w-100">
                            <img src="{{ asset('storage/'.$post->featured_image) }}" class="w-100" alt="">
                        </div>
                    @endisset
                    @foreach($post->photos as $photo)
                        <img src="{{ asset('storage/'.$photo->name) }}" alt="" class="w-25 my-3" style="height:150px;">
                    @endforeach
                    <hr>
                    <div>
                        <a href="{{ route('post.create') }}" class="btn btn-outline-primary">Create New Post</a>
                        <a href="{{ route('post.index') }}" class="btn btn-primary">All Posts</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection