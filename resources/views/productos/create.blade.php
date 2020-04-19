seccion para crear productos

<form action="{{url ('/productos')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}

<label for="nombre">{{'Nombre:'}}</label>
<input type="text" name="nombre" id="nombre" value="">
<br>

<label for="color">{{'Color:'}}</label>
<input type="text" name="color" id="color" value="">
<br>

<label for="cantidad">{{'Cantidad:'}}</label>
<input type="tel" name="cantidad" id="cantidad" value="">
<br>

<label for="precio">{{'Precio:'}}</label>
<input type="number" name="precio" id="precio" value="">
<br>

<label for="categoria">{{'Categoria:'}}</label>
<input type="text" name="categoria" id="categoria" value="">
<br>

<label for="descripcion">{{'Descripcion:'}}</label>
<input type="text" name="descripcion" id="descripcion" value="">
<br>

<label for="material">{{'Material:'}}</label>
<input type="text" name="material" id="material" value="">
<br>

<label for="modelo">{{'Modelo:'}}</label>
<input type="text" name="modelo" id="modelo" value="">
<br>

<label for="foto">{{'Foto:'}}</label>
<input type="file" name="foto" id="foto" value="">
<br>

<input type="submit" value="Agregar">


</form>