@extends('layouts.main')

@section('pageTitle')
    
    <div class="z-depth-1">
        
        <span class="btn-large">Criar novo local</span>

        <a href="{{ route('locals.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
    </div>        

@endsection

@section('content')

    <localform-component resource="create"></localform-component>

@endsection