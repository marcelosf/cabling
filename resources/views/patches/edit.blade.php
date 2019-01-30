@extends('layouts.main')

@section('pageTitle')

    <div class="z-depth-1">
            
        <span class="btn-large">Editar Patch Panel</span>

        <a href="{{ route('patches.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
        <a href="{{ route('patches.create') }}" class="btn-flat waves-effect btn-large right">
            Novo <i class="material-icons right">add</i>    
        </a>
        
    </div>        

@endsection

@section('content')


@endsection