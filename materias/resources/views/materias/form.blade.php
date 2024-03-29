@extends('layouts.app')
@section('content')

ACTUALIZAR DATOS DE MATERIAS:
<br>
    <label for="nombre">NOMBRE:</label>
    <br>
    <input type="text" name="nombre" id="nombre" value="{{$materia->nombre}}">
    <br>
    <label for="primerapel">DURACION:</label>
    <br>
    <input type="text" name="duracion" id="duracion" value="{{$materia->duracion}}">
    <br>
    
    <br>
    <input type="submit" value="ENVIAR" class="btn btn-success">
    @if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>

</div>
@endif
    

@endsection