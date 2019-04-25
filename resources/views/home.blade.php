@extends('layouts.main')

@section('content')

    <div class="row">

        <div class="col s4">
            @include('layouts.cards', [
                'title' => 'Lista',
                'image' => 'http://www.iag.usp.br/atmosfericas/sites/default/files/imagecache/originalimage/videoaca.jpg',
                'content' => 'Lista de pontos e patch panels',
                'actionText' => 'Listar',
                'actionTarget' => route('main-search.index')
            ])
        </div>

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

    <div class="row">
        <div class="col s4">
            @include('layouts.cards', [
                'title' => 'Patch Panels',
                'image' => 'https://viga.com.br/wp-content/uploads/2017/06/Por-que-construir-um-Data-Center-para-sua-empresa.jpg',
                'content' => 'Gerenciamento do cadastro dos Patch Panels',
                'actionText' => 'Gerenciar',
                'actionTarget' => route('patches.index')
            ])
        </div>

        <div class="col s4">
            @include('layouts.cards', [
                'title' => 'Switches',
                'image' => 'https://viga.com.br/wp-content/uploads/2017/06/Por-que-construir-um-Data-Center-para-sua-empresa.jpg',
                'content' => 'Gerenciamento do cadastro dos switches do IAG',
                'actionText' => 'Gerenciar',
                'actionTarget' => route('switch-port.index')
            ])
        </div>

        <div class="col s4">
            @include('layouts.cards', [
                'title' => 'Ramais',
                'image' => 'https://viga.com.br/wp-content/uploads/2017/06/Por-que-construir-um-Data-Center-para-sua-empresa.jpg',
                'content' => 'Gerenciamento do cadastro dos ramais do IAG',
                'actionText' => 'Gerenciar',
                'actionTarget' => route('phones.index')
            ])
        </div>
    </div>

    <div class="row">
        
        <div class="col s4">
            @include('layouts.cards', [
                'title' => 'Voice Panel',
                'image' => 'https://viga.com.br/wp-content/uploads/2017/06/Por-que-construir-um-Data-Center-para-sua-empresa.jpg',
                'content' => 'Gerenciamento do cadastro de voice panel do IAG',
                'actionText' => 'Gerenciar',
                'actionTarget' => route('voice-port.index')
            ])
        </div>

    </div>

@endsection
