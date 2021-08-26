@extends('layout')
@section('title','Nuevo Producto')
@section('encabezado','Nuevo Producto')


@section('content')
<form action="{{ route('product.save') }}" method="post">
        @csrf 
        <input type="hidden" name="id" value ="{{ $product->id }}">
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" value="{{@old('name') ? @old('name') : $product->name}}">
            </div>
            @error('name')
               <p class="text-danger">
                   {{ $message }}
               </p>
            @enderror
        </div>
        <div class="mb-3 row">
            <label for="cost"st class="col-sm-2 col-form-label">Cost</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="cost" name="cost" value="{{@old('cost') ? @old('cost') : $product->cost}}">
            </div>
            @error('cost')
               <p class="text-danger">
                   {{ $message }}
               </p>
            @enderror
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="price" name="price" value="{{@old('price') ? @old('price') : $product->price}}">
            </div>
            @error('price')
               <p class="text-danger">
                   {{ $message }}
               </p>
            @enderror
        </div>
        <div class="mb-3 row">
            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="quantity" name="quantity" value="{{@old('quantity') ? @old('quantity') : $product->quantity}}">
            </div>
            @error('quantity')
               <p class="text-danger">
                   {{ $message }}
               </p>
            @enderror
        </div>
        <div class="mb-3 row">
            <label for="brand" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-10">
            <select name="brand">
            <option value="">Seleccione una marca</option>
                @foreach($brands as $brand)
                <option value="{{ $brand->id }}"
                    {{$product->brand_id == $brand->id ? "selected" : ""}}
                >
                    {{ $brand->name }}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="brand" class="col-sm-2 col-form-label">Categorie</label>
            <div class="col-sm-10">
            <select name="categorie">
            <option value="">Seleccione una categoria</option>
                @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}"
                    {{$product->categorie_id == $categorie->id ? "selected" : ""}}
                >
                    {{ $categorie->name }}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-11"></div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary">Guardar</button>
            <div>
        </div>
    </form>
@endsection