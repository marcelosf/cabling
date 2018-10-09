@extends('layouts.main')

@section('pageTitle')
    Lista de Locais
@endsection

@section('content')
<html>
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

    {{ $locals->links() }}

</html>
@endsection