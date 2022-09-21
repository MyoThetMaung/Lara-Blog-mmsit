@extends('master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1 class="text-success text-center">Blog Posts</h1>
                <div class="mb-3">
                    <div>
                        @if(request('keyword'))
                            <span>Search By: {{ request('keyword') }}</span>
                            <a href="{{ route('page.index') }}"><i class="fa-solid fa-trash"></i></a>
                        @endif
                    </div>
                    <div class="">
                        <form action="{{ route('page.index') }}" method="GET">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword">
                                <button class="btn btn-secondary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                @forelse ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3>{{ $post->title }}</h3>
                            <div>
                                <a class='badge bg-secondary text-decoration-none'><span>{{ $post->category->title }}</span></a>
                            </div>
                            <p>{{ $post->excerpt }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <p>{{ $post->user->name }}</p>
                                    <p>{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                                <a href="{{ route('page.detail',$post->id) }}" class="btn btn-primary btn-sm align-">See More</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body">
                            There is no post yet.
                        </div>
                    </div>
                @endforelse
                {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection