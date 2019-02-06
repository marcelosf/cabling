@extends('layouts.main')

@section('pageTitle')
    
    <div class="z-depth-1">
            
        <span class="btn-large">Detalhes da porta</span>

        <a href="{{ route('switch-port.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
        <a href="{{ route('switch-port.create') }}" class="btn-flat waves-effect btn-large right">
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
                <div class="chip">Número da porta: {{ $port['data']['port_number'] }}</div>
                <div class="chip">Vlan: {{ $port['data']['vlan'] }}</div>
            </blockquote>
            <div class="divider"></div>


            <h5>Switch</h5>
            <blockquote>
                <div class="chip">Nome do switch: {{ $port['data']['switch_name'] }}</div>
                <div class="chip">Marca do switch: {{ $port['data']['switch_brand'] }}</div>
                <div class="chip">Patrimônio: {{ $port['data']['switch_code'] }}</div>
            </blockquote>
            <div class="divider"></div>

            <h5>Pilha</h5>
            <blockquote>
                <div class="chip">Nome da pilha: {{ $port['data']['stack_name'] }}</div>
                <div class="chip">IP da pilha: {{ $port['data']['stack_ip'] }}</div>
            </blockquote>
            <div class="divider"></div>

            <h5>Rack</h5>
            <blockquote>
                <div class="chip">Rack: {{ $port['data']['rack'] }}</div>
            </blockquote>
            
        </div>

        <div class="card-action">

            <a href="{{ route('switch-port.edit', ['id' => $port['data']['id']]) }}" class="btn-flat waves-effect">
                <i class="material-icons right">edit</i>Editar
            </a>

            <div class="right">

                <form action="{{ route('switch-port.destroy', ['id' => $port['data']['id']]) }}" method="POST">

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