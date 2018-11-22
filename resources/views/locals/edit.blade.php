@extends('layouts.main')

@section('pageTitle')

    <div class="z-depth-1">
            
        <span class="btn-large">Editar Local</span>

        <a href="{{ route('locals.index') }}" class="btn-flat waves-effect btn-large right">
            Lista  <i class="material-icons right">list</i>    
        </a>
        
        <a href="{{ route('locals.create') }}" class="btn-flat waves-effect btn-large right">
            Novo <i class="material-icons right">add</i>    
        </a>
        
    </div>        

@endsection

@section('content')

<div class="row">

    <div class="card">

        <form action="{{ route('locals.update', ['id' => $local->id]) }}" method="POST">
            
            <div class="card-content">
    
                @csrf
                @method('PUT')
                <p>
                    <label for="local-build">Bloco:</label>
                    <input type="text" name="build" id="local-build" value="{{ $local->build }}">
                </p>
                <p>
                    <label for="local-floor">Andar:</label>
                    <input type="text" name="floor" id="local-floor" value="{{ $local->floor }}">
                </p>    
                <p>
                    <label for="local-local">Local:</label>
                    <input type="text" name="local" id="local-local" value="{{ $local->local }}">
                </p>

            </div>

            <div class="card-action">

                <button class="btn-flat blue-text waves-effect waves-light" type="submit">
                    <i class="material-icons right">send</i>Enviar
                </button>

            </div>

        </form>

    </div>

</div>



@endsection