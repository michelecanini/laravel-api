@php
    $counter = 1;
@endphp

@extends('layouts.admin')

@section('content')

    <section class="container max_width_tab">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="d-flex justify-content-beetween aling-item-center"></div>
                <h2 class="text-center">Tipologie di Progetto</h2>
                <a href="{{ route('admin.types.create') }}" class="btn btn-warning">Aggiungi una Tipologia</a>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>N.</th>
                            <th>Nome</th>
                            <th>Slug</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                     <tbody class="text-center">
                        @foreach ($types as $type)
                            <tr class="align-middle">
                                {{-- <td>{{ $type->id }}</td> --}}
                                <td>{{ $counter++ }}</td>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->slug }}</td>
                                <td width="200">
                                    <a href="{{ route('admin.types.show', $type->id) }}" class="btn btn-info btn-sm"><i class="fa-regular fa-eye"></i> progetti</a>
                                    <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <form class='d-inline-block delete-type-form' action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
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
    
    @include('admin.partials.type_modal_delete')
@endsection