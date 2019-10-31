@extends('layouts.main')

@section('scripts')
@endsection

@section('pageTitle')
    <h4>Ponto: {{ $patch['data']['label'] }}</h4>
    <div class="divider"></div>
@endsection

@section('content')

<div class="row section">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Local</span>
                <blockquote>
                    <div class="chip"><b>Local</b>: {{ $patch['data']['local']->local }}</div>
                    <div class="chip"><b>Bloco</b>: {{ $patch['data']['local']->build }}</div>
                    <div class="chip"><b>Andar</b>: {{ $patch['data']['local']->floor }}</div>
                    <div class="divider"></div>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Switch</span>
                <blockquote>
                    <p>
                        <div class="chip"><b>Porta do switch: </b>{{ $patch['data']['switch_port']->port_number }}</div>
                        <div class="chip"><b>Nome do switch: </b>{{ $patch['data']['switch_port']->switch_name }}</div>
                        <div class="chip"><b>Nome da pilha: </b>{{ $patch['data']['switch_port']->stack_name }}</div>
                        <div class="chip"><b>IP da pilha: </b>{{ $patch['data']['switch_port']->stack_ip }}</div>
                    </p>
                    <div class="divider"></div>
                    <p class="section">
                        <div class="chip"><b>É POE:</b> {{ $patch['data']['switch_port']->poe }}</div>
                        <div class="chip"><b>Status do POE:</b> {{ $patch['data']['switch_port']->poe_status }}</div>
                        <div class="chip"><b>VLAN:</b> {{ $patch['data']['switch_port']->vlan }}</div>
                    </p>
                    <div class="divider"></div>
                    <p class="section">
                        <div class="chip"><b>Marca do switch:</b> {{ $patch['data']['switch_port']->switch_brand }}</div>
                        <div class="chip"><b>Patrimônio:</b> {{ $patch['data']['switch_port']->switch_code }}</div>
                    </p>
                    <div class="divider"></div>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Rack</span>
                <blockquote>
                    <div class="chip"><b>Identificação:</b> {{ $patch['data']['rack']->name }}</div>
                    <div class="chip"><b>Quantidade de Us:</b> {{ $patch['data']['rack']->size }}</div>
                    <div class="divider"></div>
                </blockquote>
            </div>
        </div>
    </div>
</div>
<a class="btn waves-effect" href="{{ route('main-search.index') }}">Voltar para a lista</a>
@endsection