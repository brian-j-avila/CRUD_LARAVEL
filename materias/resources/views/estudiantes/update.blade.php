<form action="{{url('/estudiantes/'.$estudiantes->id)}}" method="POST" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('estudiantes.form')

</form>




