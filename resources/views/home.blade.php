@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="text-center mb-5">
                    {!! QrCode::size(150)->backgroundColor(255,90,0)->generate('https://i.redd.it/8jvsjx9mx9g61.jpg') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
