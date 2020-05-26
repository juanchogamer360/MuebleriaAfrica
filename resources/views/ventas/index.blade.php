@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{
    Session::get('Mensaje')    
}}
</div>
@endif 

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>FOLIO</th>
            <th>ID PRODUCTO</th>
            <th>PRECIO</th>
            <th>FECHA VENTA</th>
        </tr>
    </thead>

    <tbody>
    @foreach($ventas as $venta)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$venta->folio}}</td>
            <td>{{$venta->idProducto}}</td>
            <td>${{$venta->total}}</td>
            <td>{{$venta->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$ventas->links()}}

</div>
@endsection