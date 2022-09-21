@extends('layouts.app')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="ms-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Testing</li>
    </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Testing Page</div>
                <div class="card-body">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste fugit aliquid delectus ad.
                        Asperiores recusandae fugiat numquam. Voluptatibus excepturi, inventore ab, fugiat eum ullam
                        error cupiditate aut dolorem veniam nemo.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection