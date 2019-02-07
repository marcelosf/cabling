@extends('layouts.main')

@section('pageTitle')

    <div class="z-depth-1">
            
        <span class="btn-large">Editar Voice Panel</span>

        <a href="{{ route('voice-port.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
        <a href="{{ route('voice-port.create') }}" class="btn-flat waves-effect btn-large right">
            Novo <i class="material-icons right">add</i>    
        </a>
        
    </div>        

@endsection

@section('content')

<voiceportform-component resource="update" id="{{ $voiceport['data']['id'] }}"></voiceportform-component>

@endsection