@extends('layouts.main')

@section('pageTitle')
    Detalhes do Local
@endsection

@section('content')

<div class="row">

    <div class="card">

        <div class="card-content">

            <blockquote>
                <div class="chip">Bloco: {{ $local->build }}</div>
                <div class="chip">Andar: {{ $local->floor }}</div>
                <div class="chip">Local: {{ $local->local }}</div>
                <div class="section"></div>

                <p>Criado em: {{ $local->created_at->format('d/m/Y') }}</p>
            </blockquote>
            

        </div>

        <div class="card-action">

            <div class="btn-flat waves-effect" onclick="window.history.back()">Cancelar</div>

            <a href="{{ route('locals.edit', ['id' => $local->id]) }}" class="btn-flat waves-effect">
                <i class="material-icons right">edit</i>Editar
            </a>

            <div class="right">

                <form action="{{ route('locals.destroy', ['id' => $local->id]) }}" method="POST">

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