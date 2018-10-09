@extends('layouts.main')

@section('pageTitle')
    Lista de Locais
@endsection

@section('content')

    <div class="row">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header"><i class="material-icons">search</i>Busca</div>
                
                <div class="collapsible-body">

                    

                        <div class="row">
                            <div class="input-field col s3">
                                <input type="text" placeholder="Bloco" id="search-local-bloco" class="validate">
                            </div>
                            <div class="input-field col s3">
                                <input type="text" placeholder="Andar" id="search-local-floor" class="validate">
                            </div>
                            <div class="input-field col s3">
                                <input type="text" placeholder="Local" id="search-local-local" class="validate">
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn waves-effect waves-light" type="submit">
                                Buscar<i class="material-icons left">search</i>
                            </button>
                        </div>
                    
                </div>
            </li>
        </ul>


    </div>

    <table>
        <thead>
            <tr>
                <th>Bloco</th>
                <th>Andar</th>
                <th>Local</th>
                <th>Detalhes</th>
                <th>Editar</th>
            </tr>
            <tbody>
            @foreach($locals as $local)
                <tr>
                    <td>{{ $local->build }}</td>
                    <td>{{ $local->floor }}</td>
                    <td>{{ $local->local }}</td>
                    <td><a href="{{ route('locals.show', ['id' => $local->id]) }}">Ver</a>
                    <td><a href="{{ route('locals.edit', ['id' => $local->id]) }}">Editar</a>
                </tr>
            @endforeach
            </tbody>
        </thead>
    </table>

    <div class="center-align">
        {{ $locals->links('pagination.materialize') }}
    </div>


@endsection