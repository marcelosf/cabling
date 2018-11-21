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
            
        <div class="row">

            <filter-component class="col s3"></filter-component>

            <a href="{{ route('locals.create') }}" class="col s2 btn btn-large btn-flat">
                Novo <i class="material-icons right">add</i>
            </a>

        </div>
        
    </div>   

    <div class="card">
        <div class="card-content">
            <localtable-component></localtable-component>
        </div>
    </div>

@endsection