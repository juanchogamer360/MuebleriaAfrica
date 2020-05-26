
<div class="form-group">
<label for="nombre" class="control-label">{{'Nombre:'}}</label>
<input type="text" class="form-control {{$errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" 
value="{{ isset($producto->nombre) ? $producto->nombre : old('nombre') }}">
{!!  $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="color" class="control-label">{{'Color:'}}</label>
<input type="text" class="form-control {{$errors->has('color') ? 'is-invalid' : '' }}" name="color" id="color" 
value="{{ isset($producto->color) ? $producto->color : old('color') }}">
{!!  $errors->first('color','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="cantidad" class="control-label">{{'Cantidad:'}}</label>
<input type="number" class="form-control {{$errors->has('cantidad') ? 'is-invalid' : '' }}" name="cantidad" id="cantidad" 
value="{{ isset($producto->cantidad) ? $producto->cantidad : old('cantidad') }}">
{!!  $errors->first('cantidad','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="precio" class="control-label">{{'Precio:'}}</label>
<input type="number" class="form-control {{$errors->has('precio') ? 'is-invalid' : '' }}" name="precio" id="precio" 
value="{{ isset($producto->precio) ? $producto->precio : old('precio') }}">
{!!  $errors->first('precio','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="categoria" class="control-label">{{'Categoria:'}}</label>
<input type="text" class="form-control {{$errors->has('categoria') ? 'is-invalid' : '' }}" name="categoria" id="categoria" 
value="{{ isset($producto->categoria) ? $producto->categoria : old('categoria') }}">
{!!  $errors->first('categoria','<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
<label for="descripcion" class="control-label">{{'Descripcion:'}}</label>
<input type="text" class="form-control {{$errors->has('descripcion') ? 'is-invalid' : '' }}" name="descripcion" id="descripcion" 
value="{{ isset($producto->descripcion) ? $producto->descripcion : old('descripcion') }}">
{!!  $errors->first('descripcion','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="material" class="control-label">{{'Material:'}}</label>
<input type="text"  class="form-control {{$errors->has('material') ? 'is-invalid' : '' }}" name="material" id="material"
value="{{ isset($producto->material) ? $producto->material : old('material') }}">
{!!  $errors->first('material','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="modelo" class="control-label">{{'Modelo:'}}</label>
<input type="text" class="form-control {{$errors->has('modelo') ? 'is-invalid' : '' }}" name="modelo" id="modelo" 
value="{{ isset($producto->modelo) ? $producto->modelo : old('modelo') }}">
{!!  $errors->first('modelo','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="foto" class="control-label">{{'Foto:'}}</label>
@if(isset($producto->foto))
<br>
<img src="{{asset ('storage').'/'.$producto->foto}}" alt="" width="200">
<br>
@endif
<input type="file" class="form-control {{$errors->has('foto') ? 'is-invalid' : '' }}" name="foto" id="foto" value="">
{!!  $errors->first('foto','<div class="invalid-feedback">:message</div>') !!}
</div>

<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}">

<a class="btn btn-primary" href="{{url('productos')}}">Regresar</a>
