@extends('layout')
@section('title','Productos')
@section('encabezado','Lsita de Productos')
@section('content')
<a href="{{ route('product.form')}}" class="btn btn-primary">Nuevo Producto</a>
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<table class="table table-stripedd table-hover"> 
    <thead>
        <tr>
            <th>Name</th>
            <th>Cost</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Brand</th>
            <th>Categorie</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
			<td>{{ $product->cost }}</td>
			<td>{{ $product->price }}</td>
			<td>{{ $product->quantity }}</td>
			<td>{{ $product->brand->name }}</td>
            <td>{{ $product->categorie->name }}</td>
            <td>
                <a href="{{ route('product.form', ['id'=> $product->id]) }}" class="btn btn-warning">Editar</a>
                <a href="/product/delete/{{$product->id}}" class="btn btn-danger">Borrar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection