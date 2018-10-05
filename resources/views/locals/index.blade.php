<html>
    <table>
        <thead>
            <tr>
                <th>Bloco</th>
                <th>Andar</th>
                <th>Local</th>
            </tr>
            <tbody>
            @foreach($locals as $local)
                <tr>
                    <td>{{ $local->build }}</td>
                    <td>{{ $local->floor }}</td>
                    <td>{{ $local->local }}</td>
                </tr>
            @endforeach
            </tbody>
        </thead>
    </table>
</html>