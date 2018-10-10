@extends('layouts.main')

@section('scripts')
        <!-- Scripts -->
        <script src="{{ asset('js/local.js') }}" defer></script>
@endsection

@section('pageTitle')
    Lista de Locais
@endsection

@section('content')

    <div class="row">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header"><i class="material-icons">search</i>Busca</div>
                
                <div class="collapsible-body">
                    <form id="search-form"> 
                        <div class="row">
                        
                            <div class="input-field col s3">
                                <input type="text" name="build" class="validate" id="build">
                                <label for="build">Bloco</label>
                            </div>
                            <div class="input-field col s3">
                                <input type="text" name="floor" class="validate" id="floor">
                                <label for="floor">Andar</label>
                            </div>
                            <div class="input-field col s3">
                                <input type="text" name="local" class="validate" id="local">
                                <label for="local">Local</label>
                            </div>    
                        </div>
                            
                        <div class="row">
                            <button class="btn waves-effect waves-light" type="submit">
                                Buscar<i class="material-icons left">search</i>
                            </button>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>

    <table class="highlight">
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
                    <td>
                        <a class="orange-text waves-effect" href="{{ route('locals.show', ['id' => $local->id]) }}">
                            <i class="material-icons right">subject</i>
                        </a>
                    </td>
                    <td>
                        <a class="waves-effect" href="{{ route('locals.edit', ['id' => $local->id]) }}">
                            <i class="material-icons right">edit</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </thead>
    </table>

    <div class="center-align">
        {{ $locals->links('pagination.materialize') }}
    </div>


@endsection