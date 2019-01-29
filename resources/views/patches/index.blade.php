@extends('layouts.main')

@section('pageTitle')
<div class="z-depth-1">
            
            <div class="row">

                <span class="btn-large">Lista de Patch Panels</span>

                <rackfilter-component class="right"></rackfilter-component>
    
                <a href="{{ route('patches.create') }}" class="btn btn-large btn-flat right">
                    Novo <i class="material-icons right">add</i>
                </a>
    
            </div>
            
        </div>   
@endsection

@section('content')

    <div class="card">
        <div class="card-content">
            <patchtable-component></patchtable-component>
        </div>
    </div>

@endsection