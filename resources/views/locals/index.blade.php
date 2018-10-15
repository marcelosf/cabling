@extends('layouts.main')

@section('scripts')
        <!-- Scripts -->
        <script src="{{ mix('js/local.js') }}" defer></script>
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

    <div class="card">
        <div class="card-content">
            <a class="btn-flat" href="{{ route('locals.create') }}">
                <i class="material-icons right">add</i>Adicionar local
            </a>
        </div>
    </div>

    <localtable-component></localtable-component>

@endsection