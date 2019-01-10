@extends('layouts.main')

@section('pageTitle')
    
    <div class="z-depth-1">
            
        <span class="btn-large">Detalhes do Rack</span>

        <a href="{{ route('racks.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
        <a href="{{ route('racks.create') }}" class="btn-flat waves-effect btn-large right">
            Novo <i class="material-icons right">add</i>    
        </a>
        
    </div>        

@endsection

@section('content')  

<div class="row">

    <div class="card">

        <div class="card-content">

            <blockquote>
                <div class="chip">Nome: {{ $rack['data']['name'] }}</div>
                <div class="chip">Andar: {{ $rack['data']['build'] }}</div>
                <div class="chip">Local: {{ $rack['data']['local'] }}</div>
                <div class="section"></div>

                <p>Criado em: {{ $rack['data']['created_at'] }}</p>
            </blockquote>
            
        </div>

        <div class="card-action">

            <a href="{{ route('racks.edit', ['id' => $rack['data']['id']]) }}" class="btn-flat waves-effect">
                <i class="material-icons right">edit</i>Editar
            </a>

            <div class="right">

                <form action="{{ route('racks.destroy', ['id' => $rack['data']['id']]) }}" method="POST">

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