@extends('layouts.main')

@section('pageTitle')

    <div class="z-depth-1">
            
        <span class="btn-large">Editar Rack</span>

        <a href="{{ route('racks.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
        <a href="{{ route('racks.create') }}" class="btn-flat waves-effect btn-large right">
            Novo <i class="material-icons right">add</i>    
        </a>
        
    </div>        

@endsection

@section('content')

<rackform-component resource="update" id="{{ $rack['data']['id'] }}"></rackform-component>

@endsection