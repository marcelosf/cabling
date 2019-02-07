@extends('layouts.main')

@section('pageTitle')
    
    <div class="z-depth-1">
        
        <span class="btn-large">Criar Novo Voice Panel</span>

        <a href="{{ route('voice-port.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
    </div>        

@endsection

@section('content')

    <voiceportform-component resourse="create"></voiceportform-component>

@endsection