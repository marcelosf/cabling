@extends('layouts.main')

@section('pageTitle')
    
    <div class="z-depth-1">
            
        <span class="btn-large">Detalhes do Patch Panel</span>

        <a href="{{ route('patches.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
        <a href="{{ route('patches.create') }}" class="btn-flat waves-effect btn-large right">
            Novo <i class="material-icons right">add</i>    
        </a>
        
    </div>        

@endsection

@section('content')  

<div class="row">

    <div class="card">

        <div class="card-content">

            <blockquote>
                <div class="chip">Referência: {{ $patch['data']['label'] }}</div>
                <div class="chip">Número: {{ $patch['data']['number'] }}</div>
                <div class="chip">Local: {{ $patch['data']['local']->build }}-{{ $patch['data']['local']->local }}</div>
                <div class="section"></div>

                <p>Criado em: {{ $patch['data']['created_at']->format('d/m/Y') }}</p>
            </blockquote>
            
        </div>

        <div class="card-action">

            <a href="{{ route('patches.edit', ['id' => $patch['data']['id']]) }}" class="btn-flat waves-effect">
                <i class="material-icons right">edit</i>Editar
            </a>

            <div class="right">

                <form action="{{ route('patches.destroy', ['id' => $patch['data']['id']]) }}" method="POST">

                    @csrf    
                    @method('DELETE')

                    <button class="btn-flat red-text waves-effect" type="submit">
                        <i class="material-icons right">clear</i>Remover
                    </button>

                </form>

            </div>
            

        </div>

    </div>

</div>

@endsection