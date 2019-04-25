@extends('layouts.main')

@section('scripts')
        <!-- Scripts -->
        <script src="{{ asset('js/local.js') }}" defer></script>
@endsection

@section('pageTitle')
<div class="z-depth-1">
            
            <div class="row">

                <span class="btn-large">Lista de Racks</span>

                <rackfilter-component class="right"></rackfilter-component>
    
                <a href="{{ route('racks.create') }}" class="btn btn-large btn-flat right">
                    Novo <i class="material-icons right">add</i>
                </a>
    
            </div>
            
        </div>   
@endsection

@section('content')

    <div class="card">
        <div class="card-content">
            <racktable-component></racktable-component>
        </div>
    </div>

@endsection