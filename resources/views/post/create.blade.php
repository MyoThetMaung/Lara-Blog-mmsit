@extends('layouts.app')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="ms-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Post</li>
    </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Post Page</div>
                <div class="card-body">
                    <h4>Create Post</h4>
                    <hr>
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="mb-2" >Post Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="mb-2" >Select category</label>
                            <select name="category" id="category" class="form-select">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $cat->id == old('category') ? 'selected' : '' }}>{{ $cat->title }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <label for="photos" class="mb-2" >Photos</label>
                                <input type="file" name="photos[]" class="form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror" id="photos" id="photos" multiple>
                                @error('photos')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                @error('photos.*')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="mb-2" >Post Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10"> {{ old('description') }} </textarea>
                            @error('description')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <label for="featured_image" class="mb-2" >Featured Image</label>
                                <input type="file" name="featured_image" class="form-control" id="featured_image" >
                                @error('featured_image')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary align-self-end">Create Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection