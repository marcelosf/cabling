<form action="{{ route('locals.store') }}" method="POST">
    
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

    <button type="submit">Enviar</button>
</form>