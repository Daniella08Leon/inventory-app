@extends('layout')
@section('title','Nueva Categoria')
@section('encabezado','Nueva Categoria')


@section('content')
<form action="{{ route('categorie.save') }}" method="post">
        @csrf 
        <input type="hidden" name="id" value ="{{ $categorie->id }}">
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" value="{{@old('name') ? @old('name') : $categorie->name}}">
            </div>
            @error('name')
               <p class="text-danger">
                   {{ $message }}
               </p>
            @enderror
            </div>
            <div class="mb-3 row">
            <label for="cost"st class="col-sm-2 col-form-label">Descripcion</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="description" name="description" value="{{@old('description') ? @old('description') : $categorie->description}}">
            </div>
            @error('cost')
               <p class="text-danger">
                   {{ $message }}
               </p>
            @enderror
        </div>
        <div class="row">
            <div class="col-sm-11">
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary">Guardar</button>
            <div>
        </div>
        </div>
        </div>
    </form>
    @endsection