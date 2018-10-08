<p>Bloco: {{ $local->build }}</p>
<p>Andar: {{ $local->floor }}</p>
<p>Local: {{ $local->local }}</p>
<p>Criado em: {{ $local->created_at->format('d/m/Y') }}</p>

<form action="{{ route('locals.destroy', ['id' => $local->id]) }}" method="POST">

    @csrf    
    @method('DELETE')

    <button type="submit">Remover</button>
</form>