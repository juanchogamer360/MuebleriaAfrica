seccion para editar productos
<form action="{{url ('/productos/'.$producto->idProducto)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}

<label for="nombre">{{'Nombre:'}}</label>
<input type="text" name="nombre" id="nombre" value="{{$producto->nombre}}">
<br>

<label for="color">{{'Color:'}}</label>
<input type="text" name="color" id="color" value="{{$producto->color}}">
<br>

<label for="cantidad">{{'Cantidad:'}}</label>
<input type="tel" name="cantidad" id="cantidad" value="{{$producto->cantidad}}">
<br>

<label for="precio">{{'Precio:'}}</label>
<input type="number" name="precio" id="precio" value="{{$producto->precio}}">
<br>

<label for="categoria">{{'Categoria:'}}</label>
<input type="text" name="categoria" id="categoria" value="{{$producto->categoria}}">
<br>

<label for="descripcion">{{'Descripcion:'}}</label>
<input type="text" name="descripcion" id="descripcion" value="{{$producto->descripcion}}">
<br>

<label for="material">{{'Material:'}}</label>
<input type="text" name="material" id="material" value="{{$producto->material}}">
<br>

<label for="modelo">{{'Modelo:'}}</label>
<input type="text" name="modelo" id="modelo" value="{{$producto->modelo}}">
<br>

<label for="foto">{{'Foto:'}}</label>
<br>
{{$producto->foto}}
<br>
<input type="file" name="foto" id="foto" value="">
<br>

<input type="submit" value="Editar">


</form>