@extends('layouts.main')

@section('pageTitle')
    
    <div class="z-depth-1">
            
        <span class="btn-large">Detalhes da porta</span>

        <a href="{{ route('voice-port.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
        <a href="{{ route('voice-port.create') }}" class="btn-flat waves-effect btn-large right">
            Novo <i class="material-icons right">add</i>    
        </a>
        
    </div>        

@endsection

@section('content')  

<div class="row">

    <div class="card">

        <div class="card-content">

            <h5>Porta</h5>
            <blockquote>
                <div class="chip">Número da porta: {{ $voiceport['data']['voiceport_number'] }}</div>
                <div class="chip">Central: {{ $voiceport['data']['central'] }}</div>
                <div class="chip">Distribuição: {{ $voiceport['data']['distribution'] }}</div>
                <div class="chip">Rack: {{ $voiceport['data']['rack'] }}</div>
            </blockquote>
            
        </div>

        <div class="card-action">

            <a href="{{ route('voice-port.edit', ['id' => $voiceport['data']['id']]) }}" class="btn-flat waves-effect">
                <i class="material-icons right">edit</i>Editar
            </a>

            <div class="right">

                <form action="{{ route('voice-port.destroy', ['id' => $voiceport['data']['id']]) }}" method="POST">

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