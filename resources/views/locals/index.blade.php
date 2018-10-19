@extends('layouts.main')

@section('scripts')
        <!-- Scripts -->
        <script src="{{ mix('js/local.js') }}" defer></script>
@endsection

@section('pageTitle')
    Lista de Locais
@endsection

@section('content')

    <filter-component></filter-component>

    <div class="divider"></div>

    <localtable-component></localtable-component>

@endsection