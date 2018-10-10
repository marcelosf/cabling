@extends('layouts.main')

@section('pageTitle')
    Editar Local
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

                <div class="btn-flat waves-effect waves-primary" onclick="window.history.back()">
                    <i class="material-icons right">close</i> Cancelar
                </div>

            </div>

        </form>

    </div>

</div>



@endsection