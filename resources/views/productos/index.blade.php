inicio (despliegue de productos)

<table class="table table-light">
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
            <td>{{$producto->foto}}</td>
            <td>
            <a href="{{ url ('/productos/'.$producto->idProducto.'/edit') }}">
              Editar
            </a>    
            | 
                <form method="post" action="{{url('/productos/'.$producto->idProducto)}}"> <!--mandando el id del registro a eliminar en la url-->
                {{csrf_field()}} <!--esta linea genera un token-->
                {{method_field('DELETE')}} <!--manda llamar el controlador destroy enviando como parametro el id con la url-->
                <button type="submit" onclick="return confirm('¿borrar?');">Borrar</button><!--onclick tiene JS para confirmar la eliminacion-->
                    
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>