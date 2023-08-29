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
    
    <section class="title_product container-fluid">
        <div class="row justify-content-center ">
            <div class="col-5 p-4 mt-5 text-left">
                <h3>{{ $project->title }}</h3>
                <p class="mt-5">{{ $project->description }}</p>
                <a href="{{ $project->github }}" class="btn btn-primary btn-sm mb-5">Repo Github</a>
                <a href="{{ $project->demo }}" class="btn btn-secondary btn-sm mb-5">Link Demo</a>
            </div>
            <div class="col-2 pl-4 mt-5 text-start"> 
                <a href="{{ route('admin.projects.index') }}" class="btn btn-info btn-sm mb-5">Elenco Progetti</a>
                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm mb-5">Modifica</i></a>
                <form class='d-inline-block delete-project-form' action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mb-5" type="submit">Cancella</button>
                </form>
                
                @if(!empty($project->thumb))
                    <img src="{{ asset('storage/'.$project->thumb) }}" alt="image" class="image_show card product_card" style="width: 300px">
                @else
                    <h5>Cover non disponibile</h5>
                @endif
                <h6 class="mt-3">SLUG: {{ $project->slug }} </h6>
                <h6>Tipologia: <span class="badge text-bg-info">{{ $project->type->name }}</span></h6>
            </div>
        </div>
    </section>
    
    @include('admin.partials.modal_delete')
@endsection