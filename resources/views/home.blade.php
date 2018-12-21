@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col s4">
            @include('layouts.cards', [
                'title' => 'Locais',
                'image' => 'http://www.iag.usp.br/atmosfericas/sites/default/files/imagecache/originalimage/videoaca.jpg',
                'content' => 'Gerenciamento do cadastro de dependências do IAG',
                'actionText' => 'Gerenciar',
                'actionTarget' => route('locals.index')
            ])
        </div>
    </div>

@endsection
