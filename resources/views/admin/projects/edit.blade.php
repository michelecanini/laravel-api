@php
@endphp

@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <h1 class='mt-5 text-center'>Modifica Progetto</h1>
            <div class="col-12 col-sm-6 mt-3">
                

                {{--errori del form--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif 

                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3 mt-5 form-group">
                        <label class="col-sm-2 col-form-label control-label">Titolo</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="title" name="title" placeholder="Inserisci qui il Titolo" value="{{ old('title') ?? $project->title }}" {{-- required --}}>
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label class="col-sm-2 col-form-label control-label">Descrizione</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" placeholder="Inserisci qui la Descrizione" {{-- required --}}>{{ old('description') ?? $project->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <div>
                            <img src="{{ asset('storage/'.$project->thumb) }}" alt="image" class="image_show card product_card mt-3 mb-3 mx-auto" style="width: 300px">
                        </div>
                        <label class="col-sm-2 col-form-label control-label">Immagine</label>
                        <div class="col-sm-10">
                            <input type="file"  class="form-control" id="thumb" name="thumb" {{-- required --}}>
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label class="col-sm-2 col-form-label control-label">Tipologia Progetto</label>
                        <div class="col-sm-10">
                            <select class="form-control" @error('type_id')is_invalid @enderror id="type_id" name="type_id" {{-- required --}}>
                                <option value="">Seleziona Tipologia Progetto</option>
                                @foreach($types as $type)
                                    <option {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <p>Seleziona le Tecnologie</p>
                        @foreach($technologies as $technology)
                            <div class="form-check form-switch form-check-inline col-2">
                                <input class="form-check-input" name="technologies[]" type="checkbox" role="switch" id="flexSwitchCheckDefault{{ $technology->id }}" value="{{ $technology->id }}" {{ $project->technologies->contains($technology->id) ? 'checked' : '' }} {{-- required --}}>
                                <label class="form-check-label" for="flexSwitchCheckDefault{{ $technology->id }}">{{ $technology->name }}</label>  
                            </div>
                        @endforeach
                    </div>
                    <div class="row mb-3 form-group">
                        <label class="col-sm-2 col-form-label control-label">Repo GitHub</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="github" name="github" placeholder="Esempio: https://static.dc.com/dc/... " value="{{ old('github') ?? $project->github }}" {{-- required --}}>
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label class="col-sm-2 col-form-label control-label">Demo</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="demo" name="demo" placeholder="Esempio: https://static.dc.com/dc/... " value="{{ old('demo') ?? $project->demo }}" {{-- required --}}>
                        </div>
                    </div>
                    <div class="text-center mt-5 mb-5">
                        <button type="submit" class="btn btn-sm btn-success">Salva</button>
                    </div>
                </form>
             </div>

             <div class="col-12 col-sm-6 mt-5">
                <div class="text-end">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-info btn-sm justify-content-end">Elenco Progetti</a>
                </div>
            </div>

        </div>
    </div>

@endsection