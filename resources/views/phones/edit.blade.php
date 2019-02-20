@extends('layouts.main')

@section('pageTitle')

    <div class="z-depth-1">
            
        <span class="btn-large">Editar Ramal</span>

        <a href="{{ route('phones.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
        <a href="{{ route('phones.create') }}" class="btn-flat waves-effect btn-large right">
            Novo <i class="material-icons right">add</i>    
        </a>
        
    </div>        

@endsection

@section('content')

    <phoneform-component resource="update" id="{{ $phone['data'][0]['id'] }}"></phoneform-component>

@endsection