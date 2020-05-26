<div class="form-group">
<label for="nombre" class="control-label">{{'Nombre:'}}</label>
<input type="text" class="form-control {{$errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" 
value="{{isset($empleado->nombre) ? $empleado->nombre : old('nombre') }}">
{!!  $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="apellido" class="control-label">>{{'Apellidos:'}}</label>
<input type="text" class="form-control {{$errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido" id="apellido" 
value="{{isset($empleado->apellido) ? $empleado->apellido : old('apellido') }}">
{!!  $errors->first('apellido','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="contaseña" class="control-label">>{{'Contraseña:'}}</label>
<input type="password" class="form-control {{$errors->has('contaseña') ? 'is-invalid' : '' }}" name="contaseña" id="contaseña" 
value="{{isset($empleado->contaseña) ? $empleado->contaseña : old('contaseña') }}">
{!!  $errors->first('contaseña','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="sueldo" class="control-label">>{{'Sueldo:'}}</label>
<input type="number" class="form-control {{$errors->has('sueldo') ? 'is-invalid' : '' }}" name="sueldo" id="sueldo" 
value="{{isset($empleado->sueldo) ? $empleado->sueldo : old('sueldo') }}">
{!!  $errors->first('sueldo','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="puesto" class="control-label">>{{'Puesto:'}}</label>
<input type="text" class="form-control {{$errors->has('puesto') ? 'is-invalid' : '' }}" name="puesto" id="puesto" 
value="{{isset($empleado->puesto) ? $empleado->puesto : old('puesto') }}">
{!!  $errors->first('puesto','<div class="invalid-feedback">:message</div>') !!}
</div>

<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}">

<a class="btn btn-primary" href="{{url('empleados')}}">Regresar</a>