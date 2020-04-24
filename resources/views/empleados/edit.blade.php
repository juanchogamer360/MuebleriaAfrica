seccion para editar empleados

<form action="{{url ('/empleados/'.$empleado->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}

<label for="nombre">{{'Nombre:'}}</label>
<input type="text" name="nombre" id="nombre" value="{{$empleado->nombre}}">
<br>

<label for="apellido">{{'Apellidos:'}}</label>
<input type="text" name="apellido" id="apellido" value="{{$empleado->apellido}}">
<br>

<label for="contaseña">{{'Contraseña:'}}</label>
<input type="password" name="contaseña" id="contaseña" value="{{$empleado->contaseña}}">
<br>

<label for="sueldo">{{'Sueldo:'}}</label>
<input type="number" name="sueldo" id="sueldo" value="{{$empleado->sueldo}}">
<br>

<label for="puesto">{{'Puesto:'}}</label>
<input type="text" name="puesto" id="puesto" value="{{$empleado->puesto}}">
<br>

<input type="submit" value="Editar">

</form>