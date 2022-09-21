@extends('layouts.app')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="ms-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
    </ol>
</nav>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Category</div>
                <div class="card-body">
                    <form action="{{ route('category.update',$category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-between">
                            <div class="w-100">
                                <input type="text" name="title" class="form-control @error('title')
                                is-invalid
                                @enderror" value="{{ old('title',$category->title) }}">
                                <div class="invalid-feedback">Please try again</div>
                            </div>
                            <button type="submit" class="btn btn-primary w-25 ms-3 align-self-start">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection