@extends('layouts.app')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="ms-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
    </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Post Page</div>
                <div class="card-body">
                    <h4>Edit Post</h4>
                    <hr>
                    <form action="{{ route('post.update',$post->id) }}" id="postUpdateForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    </form>
                        <div class="mb-3">
                            <label for="title" class="mb-2" >Post Title</label>
                            <input type="text" form="postUpdateForm" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title',$post->title) }}">
                            @error('title')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="mb-2" >Select category</label>
                            <select name="category" id="category" form="postUpdateForm" class="form-select">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $cat->id == old('category',$post->category_id) ? 'selected' : '' }}>{{ $cat->title }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="mb-2" >Post Description</label>
                            <textarea name="description" form="postUpdateForm" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10"> {{ old('description',$post->description) }} </textarea>
                            @error('description')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <label for="photos" class="mb-2" >Photos</label>
                                <input type="file" name="photos[]" form="postUpdateForm" class="form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror" id="photos" multiple >
                                @error('photos')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                @error('photos.*')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        @isset($post->photos)
                            @foreach($post->photos as $photo)
                                <div class="d-inline-block position-relative">
                                    <img src="{{ asset('storage/'.$photo->name) }}" alt="" class="my-3" style="height:150px;">
                                    <form action="{{ route('photos.destroy',$photo->id) }}" class="d-inline-block" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" style="position:absolute;top:16px;right:0;" class="btn btn-danger btn-sm"> <i class="fa-solid fa-xmark"></i> </button>
                                    </form>
                                </div>
                            @endforeach
                        @endisset
                        <div class="d-flex justify-content-between">
                            <div>
                                <label for="featured_image" class="mb-2" >Featured Image</label>
                                <input type="file" name="featured_image" form="postUpdateForm" class="form-control" id="featured_image" >
                                @error('featured_image')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary align-self-end" form="postUpdateForm">Update Post</button>
                        </div>
                        @isset($post->featured_image)
                            <img src="{{ asset('storage/'.$post->featured_image) }}" class="w-25 mt-4" alt="">
                        @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection