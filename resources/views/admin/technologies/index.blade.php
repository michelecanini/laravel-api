@php
@endphp

@extends('layouts.admin')

@section('content')

    <section class="container max_width_tab">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="d-flex justify-content-beetween aling-item-center"></div>
                <h2 class="text-center">Tecnologie del Progetto</h2>
                <a href="{{ route('admin.technologies.create') }}" class="btn btn-warning">Aggiungi una Tecnologia</a>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Slug</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                     <tbody class="text-center">
                        @foreach ($technologies as $technology)
                            <tr class="align-middle">
                                <td>{{ $technology->id }}</td>
                                <td>{{ $technology->name }}</td>
                                <td>{{ $technology->slug }}</td>
                                <td width="200">
                                    <a href="{{ route('admin.technologies.show', $technology->id) }}" class="btn btn-info btn-sm"><i class="fa-regular fa-eye"></i> progetti</a>
                                    <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <form class='d-inline-block delete-technology-form' action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST">
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
    
    @include('admin.partials.technology_modal_delete')
@endsection