@php
@endphp

@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <h1 class='mt-5 text-center'>Modifica una Tecnologia</h1>
            <div class="col-12 col-sm-7 mt-3">

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

                <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3 mt-5 form-group">
                        <label class="col-sm-2 col-form-label control-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci qui la Tipologia" value="{{ old('name') ?? $technology->name }}" required>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-sm btn-success ">Salva</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-sm-5 mt-5">
                <div class="text-end">
                    <a href="{{ route('admin.technologies.index') }}" class="btn btn-info btn-sm justify-content-end">Elenco Tecnologie</a>
                </div>
            </div>
        </div>
    </div>

@endsection