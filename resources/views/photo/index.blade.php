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
                    <h4>Photos</h4>
                   <div class="gallery">
                        @forelse(Auth::user()->photos as $photo)
                            <img src="{{ asset('storage/'.$photo->name) }}" class='w-100 mb-3 rounded' alt=''>
                        @empty
                            <p>Nothing to show</p>
                        @endforelse
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection