@extends('layouts.app')
@section('content')

ACTUALIZAR DATOS DEL PROFESOR:
<br>
<form action="{{ url('/estudiantes/'.$estudiantes->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="nombre">NOMBRE:</label>
    <br>
    <input type="text" name="nombre" id="nombre" value="{{$estudiantes->nombre}}">
    <br>
    <label for="primerapel">PRIMER APELLIDO:</label>
    <br>
    <input type="text" name="primerapel" id="primerapel" value="{{$estudiantes->primerapel}}">
    <br>
    <label for="segundoapel">SEGUNDO APELLIDO:</label>
    <br>
    <input type="text" name="segundoapel" id="segundoapel" value="{{$estudiantes->segundoapel}}">
    <br>
    <label for="correo">CORREO:</label>
    <br>
    <input type="email" name="correo" id="correo" value="{{$estudiantes->correo}}">
    <br>
    <label for="materia_id">MATERIA:</label>
    <br>
    <select name="materia_id" id="materia_id">
        @foreach($materias as $materia)
            <option value="{{ $materia->id }}" {{ $materia->id == $estudiantes->materia_id ? 'selected' : '' }}>
                {{ $materia->nombre }}
            </option>
        @endforeach
    </select>
    <br>
    <label for="foto">FOTO:</label>
    <br>
    <img src="{{ asset('storage/'.$estudiantes->foto) }}" alt="" style="height: 110px;">
    <br>
    <input type="file" name="foto" id="foto" class="btn btn-warning">
    <br>
    <input type="submit" value="ENVIAR" class="btn btn-success">
</form>

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
