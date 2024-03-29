<form action="{{url('/materias/'.$materia->id)}}" method="POST" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('materias.form')

</form>




