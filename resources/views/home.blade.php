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

        <div class="col s4">
            @include('layouts.cards', [
                'title' => 'Racks',
                'image' => 'https://viga.com.br/wp-content/uploads/2017/06/Por-que-construir-um-Data-Center-para-sua-empresa.jpg',
                'content' => 'Gerenciamento do cadastro dos racks do IAG',
                'actionText' => 'Gerenciar',
                'actionTarget' => route('racks.index')
            ])
        </div>
    </div>

@endsection
