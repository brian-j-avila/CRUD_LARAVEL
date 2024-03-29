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
<form action="{{url('/materias')}}" method="post" enctype="multipart/form-data">
@csrf
REGISTRAR NUEVA MATERIA
<br>
<label for="nombre">NOMBRE:</label>
<br>
<input type="text" name="nombre" id="nombre" >
<br>
<label for="duracion">DURACION:</label>
<br>
<!-- Asegúrate de asignar el atributo "name" al campo de duración -->
<input type="number" name="duracion" id="duracion">
<br>
<input type="submit" value="REGISTRAR" class="btn btn-success">
</form>

@endsection
