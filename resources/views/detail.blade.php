@extends('master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1 class="text-success text-center">{{ $post->title }}</h1>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3>{{ $post->title }}</h3>
                            <div>
                                <a class='badge bg-secondary text-decoration-none'><span>{{ $post->category->title }}</span></a>
                            </div>
                            <p>{{ $post->excerpt }}</p>
                            <div>
                                <img src="{{ asset('storage/'.$post->featured_image) }}" alt="">
                                <div class="d-flex justify-content-between mb-3">
                                    @isset($post->photos)
                                        @foreach ($post->photos as $image)
                                            <img src="{{ asset('storage/'.$image->name) }}" alt="" class="w-25 mt-3"> 
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <p>{{ $post->user->name }}</p>
                                    <p>{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                                <a href="{{ route('page.detail',$post->id) }}" class="btn btn-primary btn-sm align-">See More</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection