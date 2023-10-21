@php
@endphp

@extends('layouts.app')

@section('content')
    
    {{--sezione title--}}
    <section class="band_product container-fluid">
        <div class="row band_product">
            <div class="col-12 mt-5">
                <h2 class="text-center">Tutti i Progetti della tecnologia: {{ $technology->name }}</h2>
            </div>
        </div>
    </section>
    
    <section class="title_product container-fluid">
        <div class="row justify-content-center d-flex ">
            <div class="col-5 p-4 mt-5 text-center">
                <a href="{{ route('admin.technologies.index') }}" class="btn btn-info btn-sm mb-2">Elenco delle Tecnologie</a>
                <h6 class="mt-3">SLUG: {{ $technology->slug }} </h6>
                <h6>Tecnologia: <span class="badge text-bg-info">{{ $technology->name }}</span></h6>
            </div>
        </div>
    </section>

    <section class=" container">
        <div class="row justify-content-center">
        @foreach ($technology->projects as $project)
            <div class="card col-12 col-md-4 m-3 text-white border border-secondary" style="width: 25rem; " >
                <div class="text-end mt-1"><span class="badge text-bg-info">{{ $technology->name }}</span></div>
                <img src="{{ asset('storage/'.$project->thumb) }}" class="card-img-top mt-3" alt="{{ $project->title }}">
                <div class="card-body">
                    <h5 class="card-title text-black">{{ $project->title }}</h5>
                    <a href="{{ $project->github }}" target="_blank" class="btn btn-primary">GitHub</a>
                    <a href="{{ $project->demo }}" target="_blank" class="btn btn-secondary">Demo</a>     
                </div>
            </div>
         @endforeach 
        </div>
    </section>

    @include('admin.partials.modal_delete')
@endsection