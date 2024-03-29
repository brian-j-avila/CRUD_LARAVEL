<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    public function index()
    {
        $datos['materias'] = Materia::paginate(10); // Cambia el número de elementos por página según tus necesidades
        return view('materias.index', $datos);
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(Request $request)
    {
        $validacion = [
            'nombre' => 'required|string|max:90',
            'duracion' => 'required|integer|max:999'
        ];

        $msj = [
            'required' => 'El :attribute es requerido',
        ];

        $this->validate($request, $validacion, $msj);

        $datosMateria = $request->only('nombre', 'duracion');

        Materia::create($datosMateria);

        return redirect('materias')->with('mensaje', 'Materia registrada correctamente');
    }

    public function show(Materia $materia)
    {
        // Puedes implementar la lógica para mostrar detalles de una materia si lo deseas
    }

    public function edit($id)
    {
        $materia = Materia::findOrFail($id);
        return view('materias.update', compact('materia'));
    }

    public function update(Request $request, $id)
    {
        $validacion = [
            'nombre' => 'required|string|max:90',
            'duracion' => 'required|integer|max:999'
        ];

        $this->validate($request, $validacion);

        $datos = $request->only('nombre', 'duracion');

        Materia::where('id', '=', $id)->update($datos);

        return redirect('materias')->with('mensaje', 'Materia actualizada correctamente');
    }

    public function destroy($id)
    {
        Materia::destroy($id);

        return redirect('materias')->with('mensaje', 'Materia eliminada correctamente');
    }
}
