@extends('layouts.main')

@section('scripts')
        <!-- Scripts -->
        <script src="{{ asset('js/local.js') }}" defer></script>
@endsection

@section('pageTitle')
<div class="z-depth-1">
            
            <div class="row">

                <span class="btn-large">Lista de Locais</span>

                <filter-component class="right"></filter-component>
    
                <a href="{{ route('locals.create') }}" class="btn btn-large btn-flat right">
                    Novo <i class="material-icons right">add</i>
                </a>
    
            </div>
            
        </div>   
@endsection

@section('content')

    <div class="card">
        <div class="card-content">
            <localtable-component></localtable-component>
        </div>
    </div>

@endsection