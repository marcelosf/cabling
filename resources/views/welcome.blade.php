@extends('layouts.main')

@section('scripts')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endsection

@section('welcome')
    <video autoplay muted loop id="video">
        <source src="{{ asset('images/rain.mp4') }}" type="video/mp4">
    </video>
@endsection

@section('content')
    <div class="row main-content">
        <div class="col s7">
            <div class="section white-text">
                <h4>Infraestrutura de rede do IAG</h4>
            </div>
            <div class="divider"></div>
            <p>
                <a href="{{ route('login.senhaunica') }}" class="btn-large waves-effect">
                    <i class="material-icons left">account_circle</i>
                    Login
                </a>
            </p>
        </div>
    </div>
@endsection