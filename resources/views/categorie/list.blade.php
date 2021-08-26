@extends('layout')
@section('title','Categorias')
@section('encabezado','Lista de Categorias')
@section('content')
<a href="{{ route('categorie.form')}}" class="btn btn-primary">Nuevo Producto</a>
<table class="table table-stripedd table-hover"> 
    <thead>
        <tr>
            <th>Name</th>
            <th>Descripcion</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $categorie)
        <tr>
            <td>{{ $categorie->name }}</td>
            <td>{{ $categorie->description }}</td>
            <td>
                <a href="{{ route('categorie.form', ['id'=> $categorie->id]) }}" class="btn btn-warning">Editar</a>
                <a href="/categorie/delete/{{$categorie->id}}" class="btn btn-danger">Borrar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection