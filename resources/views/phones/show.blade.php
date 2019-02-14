@extends('layouts.main')

@section('pageTitle')
    
    <div class="z-depth-1">
            
        <span class="btn-large">Detalhes do Ramal</span>

        <a href="{{ route('phones.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
        <a href="{{ route('phones.create') }}" class="btn-flat waves-effect btn-large right">
            Novo <i class="material-icons right">add</i>    
        </a>
        
    </div>        

@endsection

@section('content')  

<div class="row">

    <div class="card">

        <div class="card-content">

            <h5>Ramal</h5>
            <blockquote>
                <div class="chip">Número: {{ $phone['data']['number'] }}</div>
                <div class="chip">Categoria: {{ $phone['data']['category'] }}</div>
            </blockquote>
            <div class="divider"></div>

            <h5>Manobras</h5>
            <blockquote>
                <div class="chip">Voice Panel: {{ $phone['data']['voicepanel'] }}</div>
                <div class="chip">Porta do Switch: {{ $phone['data']['switchport'] }}</div>
                <div class="chip">Rack: {{ $phone['data']['rack'] }}</div>
            </blockquote>
            
        </div>

        <div class="card-action">

            <a href="{{ route('phones.edit', ['id' => $phone['data']['id']]) }}" class="btn-flat waves-effect">
                <i class="material-icons right">edit</i>Editar
            </a>

            <div class="right">
                <form action="{{ route('phones.destroy', ['id' => $phone['data']['id']]) }}" method="POST">
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