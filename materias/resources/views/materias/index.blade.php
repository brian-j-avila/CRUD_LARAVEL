@extends('layouts.app')
@section('content')
@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{Session::get('mensaje')}}
</div>
@endif
<div class="container">
    @if(Session::has('mensaje'))
    {{Session::get('mensaje')}}
    @endif
    <a href="{{url('/estudiantes/create')}}" class="btn btn-success">Crear un nuevo profesor</a>
    <a href="{{url('/materias/create')}}" class="btn btn-success">Crear un nueva materia</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre</th>
                <th>Duración</th>
                <th>acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach($materias as $materia)
            <tr>
                <td>{{$materia->id}}</td>
                <td>{{$materia->nombre}}</td>
                <td>{{$materia->duracion}} HORAS</td>

                <td>
                   
                        <a href="{{url('/materias/'.$materia->id.'/edit')}}" class="btn btn-info" style="width:auto; font-size:10px;">Editar</a>
                </td>
            </tr>

            @endforeach
        </tbody>



    </table>


</div>
@endsection