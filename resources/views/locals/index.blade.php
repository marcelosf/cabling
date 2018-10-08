<html>
    <table>
        <thead>
            <tr>
                <th>Bloco</th>
                <th>Andar</th>
                <th>Local</th>
                <th>Detalhes</th>
            </tr>
            <tbody>
            @foreach($locals as $local)
                <tr>
                    <td>{{ $local->build }}</td>
                    <td>{{ $local->floor }}</td>
                    <td>{{ $local->local }}</td>
                    <td><a href="{{ route('locals.show', ['id' => $local->id]) }}">Ver</a>
                </tr>
            @endforeach
            </tbody>
        </thead>
    </table>
</html>