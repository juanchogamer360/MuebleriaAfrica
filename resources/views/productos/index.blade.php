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

@if(Session::has('Mensaje2'))

<div class="alert alert-warning" role="alert">
{{  
    Session::get('Mensaje2')     
}}
</div>
@endif 

@if(Session::has('Mensaje3'))

<div class="alert alert-danger" role="alert">
{{  
    Session::get('Mensaje3')     
}}
</div>
@endif

<a href="{{url('productos/create')}}" class="btn btn-success">Agregar producto</a><br>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>COLOR</th>
            <th>CANTIDAD</th>
            <th>PRECIO</th>
            <th>CATEGORIA</th>
            <th>DESCRIPCION</th>
            <th>MATERIAL</th>
            <th>MODELO</th>
            <th>FOTO</th>
            <th>ACCION</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$producto->idProducto}}</td>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->color}}</td>
            <td>{{$producto->cantidad}}</td>
            <td>${{$producto->precio}}</td>
            <td>{{$producto->categoria}}</td>
            <td>{{$producto->descripcion}}</td>
            <td>{{$producto->material}}</td>
            <td>{{$producto->modelo}}</td>
            <td> <img src="{{asset ('storage').'/'.$producto->foto}}" class="" alt="" width="100"> </td>
            <td>
            <a class="btn btn-warning" href="{{ url ('/productos/'.$producto->idProducto.'/edit') }}">
              Editar
            </a>    
        
                <form method="post" action="{{url('/productos/'.$producto->idProducto)}}" style="display: inline" > <!--mandando el id del registro a eliminar en la url-->
                {{csrf_field()}} <!--esta linea genera un token-->
                {{method_field('DELETE')}} <!--manda llamar el controlador destroy enviando como parametro el id con la url-->
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿borrar?');">Borrar</button><!--onclick tiene JS para confirmar la eliminacion-->     
                </form>

<!--
                <form action="{{ url ('/venta/'.$producto->idProducto) }}" method="get" style="display: inline" >
                {{csrf_field()}} esta linea genera un token
                {{method_field('GET')}}
                <button class="btn btn-success" type="submit" onclick="return confirm('¿Vender?');">Vender</button> onclick tiene JS para confirmar la eliminacion   
                </form>
-->    
            <a class="btn btn-success" href="{{ url ('/venta/'.$producto->idProducto) }}" onclick="return confirm('¿Vender?');">
              Vender
            </a>

               
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$productos->links()}}

</div>
@endsection