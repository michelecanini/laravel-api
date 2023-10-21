@php
    $counter = 1;
@endphp

@extends('layouts.admin')

@section('content')

    <section class="container max_width_tab">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="d-flex justify-content-between align-item-center"></div>
                <h2 class="text-center text-white">Tutti i Progetti</h2>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-warning">Aggiungi Progetto</a>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>N.</th>
                            <th>Titolo</th>
                            <th>Immagine</th>
                            {{-- <th>Descrizione</th> --}}
                            <th>Repo GitHub</th>
                            <th>Demo</th>
                            <th>Slug</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                     <tbody class="text-center">
                        @foreach ($projects as $project)
                            <tr class="align-middle">
                                {{-- <td>{{ $project->id }}</td> --}}
                                <td>{{ $counter++ }}</td>
                                <td>{{ $project->title }}</td>
                                <td>
                                    @if(!empty($project->thumb))
                                        <img src="{{ asset('storage/'.$project->thumb) }}" class="image" style="width: 160px; height: 70px;">
                                    @else
                                        <h5>Cover non disponibile</h5>
                                    @endif
                                </td>
                                {{-- <td>{{ $project->description }}</td> --}}
                                <td><a href="{{ $project->github }}" class="btn btn-primary mb-2">Vai su Github</a></td>
                                <td><a href="{{ $project->demo }}" class="btn btn-secondary mb-2">Vai alla Demo</a></td>
                                <td>{{ $project->slug }}</td>
                                <td width="200">
                                    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-info btn-sm"><i class="fa-regular fa-eye"></i></a>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <form class='d-inline-block delete-project-form' action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm text-center" type="submit" style="width: 31px; height: 30px;">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form> 
                                </td>
                            </tr>
                        @endforeach 
                    </tbody> 
                </table>
            </div>
        </div>
    </section>
    
    @include('admin.partials.modal_delete')
@endsection