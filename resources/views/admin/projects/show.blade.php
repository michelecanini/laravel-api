@php
@endphp

@extends('layouts.app')

@section('content')
    
    {{--sezione banda blu--}}
    <section class="band_product container-fluid">
        <div class="row band_product">
            <div class="col-12 mt-5">
                <h2 class="text-center">Show Progetto</h2>
            </div>
        </div>
    </section>
    
    <section class="title_product container">
        <div class="row justify-content-center ">
            <div class="col-12 p-4 mt-5 text-center">
                <h3 class="mb-5">{{ $project->title }}</h3>
                @if(!empty($project->thumb))
                    <img src="{{ asset('storage/'.$project->thumb) }}" alt="image" class="image_show card product_card img-fluid mx-auto d-block" style="width: 500px">
                @else
                    <h5>Cover non disponibile</h5>
                @endif
                 <p class="mt-5"><strong>Descrizione:</strong> {{ $project->description }}</p>
                <p><strong>Link GitHub:</strong> {{ $project->github }}</p>
                <p><strong>Link Demo:</strong> {{ $project->demo }}</p>
                <a href="{{ $project->github }}" class="btn btn-primary btn-sm p-1 mb-2">Vai su Github</a>
                <a href="{{ $project->demo }}" class="btn btn-secondary btn-sm mb-2">Vai alla Demo</a>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-info btn-sm mb-2">Elenco Progetti</a>
                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm mb-2">Modifica</a>
                <form class='d-inline-block delete-project-form' action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mb-2" type="submit">Cancella</button>
                </form>

                
                <h6 class="mt-3">SLUG: {{ $project->slug }} </h6>
                <h6>Tipologia: <span class="badge text-bg-info">{{ $project->type->name }}</span></h6>
            </div>
            
        </div>
    </section>
    
    @include('admin.partials.modal_delete')
@endsection