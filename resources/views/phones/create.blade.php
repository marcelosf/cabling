@extends('layouts.main')

@section('pageTitle')
    
    <div class="z-depth-1">
        
        <span class="btn-large">Criar Ramal</span>

        <a href="{{ route('phones.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
    </div>        

@endsection

@section('content')

    <phoneform-component resource="create" dusk="phoneform-component"></phoneform-component>

@endsection