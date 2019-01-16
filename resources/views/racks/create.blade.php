@extends('layouts.main')

@section('pageTitle')
    
    <div class="z-depth-1">
        
        <span class="btn-large">Criar novo Rack</span>

        <a href="{{ route('racks.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
    </div>        

@endsection

@section('content')

    <rackform-component resource="create"></rackform-component>

@endsection