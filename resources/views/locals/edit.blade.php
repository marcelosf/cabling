<form action="{{ route('locals.update', ['id' => $local->id]) }}" method="POST">
    
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

    <button type="submit">Enviar</button>
</form>