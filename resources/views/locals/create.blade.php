@extends('layouts.main')

@section('pageTitle')
    Criar Novo Local
@endsection

@section('content')

    <div class="z-depth-1">
            
        <a href="{{ route('locals.index') }}" class="btn btn-flat waves-effect btn-large">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
    </div>   

    <div class="card">

        <form action="{{ route('locals.store') }}" method="POST">   
        
            <div class="card-content">

                @csrf

                <p>
                    <label for="local-build">Bloco:</label>
                    <input type="text" name="build" id="local-build">
                </p>
                <p>
                    <label for="local-floor">Andar:</label>
                    <input type="text" name="floor" id="local-floor">
                </p>    
                <p>
                    <label for="local-local">Local:</label>
                    <input type="text" name="local" id="local-local">
                </p>

            </div>

            <div class="card-action">

                <button class="btn-flat waves-effect waves-light" type="submit">
                    <i class="material-icons right">send</i> Salvar
                </button>

            </div>

        </form>

    </div>

@endsection