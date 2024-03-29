@extends('layouts.app')
@section('content')
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{url('/estudiantes')}}" method="post" enctype="multipart/form-data">
@csrf
REGISTRAR NUEVO PROFESOR
<br>
<label for="nombre">NOMBRE:</label>
<br>
<input type="text" name="nombre" id="nombre" >
<br>
<label for="primerapel">PRIMER APELLIDO:</label>
<br>
<input type="text" name="primerapel" id="primerapel">
<br>
<label for="segundoapel">SEGUNDO APELLIDO:</label>
<br>
<input type="text" name="segundoapel" id="segundoapel">
<br>
<label for="correo">CORREO:</label>
<br>
<input type="email" name="correo" id="correo">
<br>
<label for="materia_id">MATERIA:</label>
<br>
<select name="materia_id" id="materia_id">
    @foreach($materias as $materia)
        <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
    @endforeach
</select>

<br>
<label for="foto">FOTO:</label>
<br>
<input type="file" name="foto" id="foto" class="btn btn-warning">
<br>
<input type="submit" value="REGISTRAR" class="btn btn-success">
</form>
@endsection
