@extends('layouts.main')

@section('pageTitle')
    
    <div class="z-depth-1">
        
        <span class="btn-large">Criar Nova Porta de Switch</span>

        <a href="{{ route('switch-port.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
    </div>        

@endsection

@section('content')

    <switchportform-component resourse="create"></switchportform-component>

@endsection