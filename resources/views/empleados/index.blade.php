inicio (despliegue de empleados)

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDOS</th>
            <th>CONTRASEÑA</th>
            <th>SUELDO</th>
            <th>PUESTO</th>
            <th>ACCION</th>
        </tr>
    </thead>

    <tbody>
    @foreach($empleados as $empleado)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$empleado->id}}</td>
            <td>{{$empleado->nombre}}</td>
            <td>{{$empleado->apellido}}</td>
            <td>{{$empleado->contaseña}}</td>
            <td>{{$empleado->sueldo}}</td>
            <td>{{$empleado->puesto}}</td>
            <td>
                
            <a href="{{ url ('/empleados/'.$empleado->id.'/edit') }}">
              Editar
            </a>
            | 
                <form method="post" action="{{url('/empleados/'.$empleado->id)}}"> <!--mandando el id del registro a eliminar en la url-->
                {{csrf_field()}} <!--esta linea genera un token-->
                {{method_field('DELETE')}} <!--manda llamar el controlador destroy enviando como parametro el id con la url-->
                <button type="submit" onclick="return confirm('¿borrar?');">Borrar</button><!--onclick tiene JS para confirmar la eliminacion-->
                    
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>