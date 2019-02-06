@extends('layouts.main')

@section('scripts')
        <!-- Scripts -->
@endsection

@section('pageTitle')
<div class="z-depth-1">
            
            <div class="row">

                <span class="btn-large">Lista de Switches</span>

                <switchportfilter-component class="right"></switchportfilter-component>
    
                <a href="{{ route('switch-port.create') }}" class="btn btn-large btn-flat right">
                    Novo <i class="material-icons right">add</i>
                </a>
    
            </div>
            
        </div>   
@endsection

@section('content')

    <div class="card">
        <div class="card-content">
            <switchporttable-component></switchporttable-component>
        </div>
    </div>

@endsection