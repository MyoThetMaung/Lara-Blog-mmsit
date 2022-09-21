@extends('layouts.app')

@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="ms-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Post</li>
    </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Post List</h4>
                    @bladeTesting('saimon')
                       <p>This is Custom Blade Testing area</p>
                    @endbladeTesting
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            @if(request('keyword'))
                                <span>Search By: {{ request('keyword') }}</span>
                                <a href="{{ route('post.index') }}"><i class="fa-solid fa-trash"></i></a>
                            @endif
                        </div>
                        <div class="">
                            <form action="{{ route('post.index') }}" method="GET">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword">
                                    <button class="btn btn-secondary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                @notAuthor
                                    <th>Owner</th>
                                @endnotAuthor
                                <th>Control</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->title }}</td>
                                    @notAuthor
                                        <td>{{ $post->user->name }}</td>
                                    @endnotAuthor
                                    <td>
                                        <div class="d-flex justify-content-spacebetween">
                                        <a href="{{ route('post.show',$post->id) }}" class="btn btn-sm btn-success me-1"><i class="fa-solid fa-circle-info"></i></a>
                                        @can('update',$post)
                                            <a href="{{ route('post.edit',$post->id) }}" class="btn btn-sm btn-warning me-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                        @endcan
                                        @can('delete',$post)
                                            <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type='submit' class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        @endcan
                                        </div>
                                    </td>
                                    <td>
                                        <p>{{ $post->created_at->format('d M Y') }}</p>
                                        <p>{{ $post->updated_at->format('H:i:s') }}</p>
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection