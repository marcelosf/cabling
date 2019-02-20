@extends('layouts.main')

@section('pageTitle')
<div class="z-depth-1">
            
            <div class="row">

                <span class="btn-large">Lista Telefones</span>

                <rackfilter-component class="right"></rackfilter-component>
    
                <a href="{{ route('phones.create') }}" class="btn btn-large btn-flat right">
                    Novo <i class="material-icons right">add</i>
                </a>
    
            </div>
            
        </div>   
@endsection

@section('content')

    <div class="card">
        <div class="card-content">
            <phonetable-component dusk="phonetable-component"></phonetable-component>
        </div>
    </div>

@endsection