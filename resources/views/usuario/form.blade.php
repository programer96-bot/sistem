//Formulario que tendran los datos en comun con create y edit

<h1> {{ $modo}} usuario </h1>

@if(count($errors)>0)

   <div clas="alert alert-danger" role="alert">
    <ul>
    @foreach  ($errors->all() as $error)
        <li> {{ $error }} </li>

        @endforeach

        @endif
</ul>

</div>


<div class="form-group">

<label for="Nombres">Nombres</label>
<input type="text" class="form-control" name="Nombres" value="{{ isset($usuario->Nombres)?$usuario->Nombres:old('Nombres')}}" id="Nombres">
<br>


</div>

<div class="form-group">

<label for="Apellidos">Apellidos</label>
<input type="text" class="form-control" name="Apellidos" value="{{isset ($usuario->Apellidos)?$usuario->Apellidos: old('Apellidos')}}"id="Apellidos">


</div>

<div class="form-group">

<label for="TipoIdent">TipoIdent</label>
<input type="text" class="form-control" name="TipoIdent" value="{{isset($usuario->TipoIdent)?$usuario->TipoIdent: old('TipoIdent')}}"id="TipoIdent">


</div>

<div class="form-group">

<label for="NIdent">NIdent</label>
<input type="text" class="form-control" name="NIdent" value="{{isset($usuario->NIdent)?$usuario->Nident:old('NIdent')}}"id="NIdent">


</div>

<div class="form-group">

<label for="Fecha">Fecha</label>
<input type="date" class="form-control" name="Fecha" value="{{isset($usuario->Fecha)?$usuario->Fecha: old('Fecha')}}"id="Fecha">

</div>

<div class="form-group">

<label for="Contraseña">Contraseña</label>
<input type="text" class="form-control" name="Contraseña" value="{{isset($usuario->contraseña)?$usuario->contraseña: old('contraseña')}}" id="Contraseña">

</div>

<input class= "btn btn-success"type="submit" value="{{ $modo}} Datos">

<a class="btn btn-primary" href="{{url ('usuario/') }}">Regresar </a>

<br>
