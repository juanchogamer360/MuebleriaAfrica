seccion para crear empleados

<form action="{{url ('/empleados')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}

<label for="nombre">{{'Nombre:'}}</label>
<input type="text" name="nombre" id="nombre" value="">
<br>

<label for="apellido">{{'Apellidos:'}}</label>
<input type="text" name="apellido" id="apellido" value="">
<br>

<label for="contaseña">{{'Contraseña:'}}</label>
<input type="password" name="contaseña" id="contaseña" value="">
<br>

<label for="sueldo">{{'Sueldo:'}}</label>
<input type="number" name="sueldo" id="sueldo" value="">
<br>

<label for="puesto">{{'Puesto:'}}</label>
<input type="text" name="puesto" id="puesto" value="">
<br>

<input type="submit" value="Agregar">


</form>