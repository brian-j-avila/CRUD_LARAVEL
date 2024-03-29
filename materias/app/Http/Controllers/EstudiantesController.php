<?php

namespace App\Http\Controllers;

use App\Models\estudiantes;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EstudiantesController extends Controller
{

    public function index()
    {
        $datos['estudiante'] = estudiantes::paginate(1);
        return view('estudiantes.index', $datos);
    }


    public function create()
    {
        $materias = Materia::all();
    return view('estudiantes.create', ['materias' => $materias]);
    }


    public function store(Request $request)
    {
        $validacion = [
            'nombre' => 'required|string|max:90',
            'primerapel' => 'required|string|max:90',
            'segundoapel' => 'required|string|max:90',
            'correo' => 'required|string|max:90'
            
        ];
        $msj = [
            'required' => 'El :attribute es requerido',
            'foto.required'=>'la foto es requerida'
        ];
        $this->validate($request, $validacion, $msj);
        $datosestudiantes = request()->except('_token');
        if ($request->hasFile('foto')) {
            $datosestudiantes['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        estudiantes::insert($datosestudiantes);
        
        return redirect('estudiantes')->with('mensaje','Registro de Profesor realizado correctamente');

    }


    public function show(estudiantes $estudiantes)
    {
    }


    public function edit($id)
    {
        $materias = Materia::all();
        $estudiantes = estudiantes::findOrFail($id);
        return view('estudiantes.update', compact('estudiantes', 'materias'));
    }


    public function update(Request $request, $id)
    {
        
        $validacion = [
            'nombre' => 'required|string|max:90',
            'primerapel' => 'required|string|max:90',
            'segundoapel' => 'required|string|max:90',
            'correo' => 'required|string|max:90'
        ];
        $msj = [
            'required' => 'El :attribute es requerido',
            'foto.required'=>'la foto es requerida'
        ];
        $this->validate($request, $validacion, $msj);

        $datos = request()->except('_token', '_method');

        if ($request->hasFile('foto')) {
            $estudiantes = estudiantes::findOrFail($id);
            if ($estudiantes->foto && Storage::disk('public')->exists($estudiantes->foto)) {
                Storage::disk('public')->delete($estudiantes->foto);
            }
            $datos['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        estudiantes::where('id', '=', $id)->update($datos);
        $estudiantes = estudiantes::findOrFail($id);
        return redirect('estudiantes')->with('mensaje','Edición de Profesor realizada correctamente');
    }


    public function destroy($id)
    {

        $estudiantes = estudiantes::findOrFail($id);
        if ($estudiantes->foto && Storage::disk('public')->exists($estudiantes->foto)) {
            Storage::disk('public')->delete($estudiantes->foto);
        }
        estudiantes::destroy($id);

        return redirect('estudiantes')->with('mensaje','Registro  de Profesor eliminado correctamente');

    }
}
