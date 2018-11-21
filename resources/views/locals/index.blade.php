@extends('layouts.main')

@section('scripts')
        <!-- Scripts -->
        <script src="{{ mix('js/local.js') }}" defer></script>
@endsection

@section('pageTitle')
    Lista de Locais
@endsection

@section('content')

    <div class="z-depth-1">
            
        <filter-component></filter-component>
        
    </div>   

    <div class="card">
        <div class="card-content">
            <localtable-component></localtable-component>
        </div>
    </div>

@endsection