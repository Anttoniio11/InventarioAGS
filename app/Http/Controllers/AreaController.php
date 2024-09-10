<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AreaController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index()
    {
        $areas = Area::paginate(10);
        return view("areas.index", compact("areas"));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view("areas.create");
    }

    /**
     * Almacena un nuevo recurso en el almacenamiento.
     */
    public function store(Request $request)
    {
        // Validación de los campos del formulario
        $request->validate([
            'area' => [
                'required',
                Rule::unique('areas')->where(function ($query) use ($request) {
                    return $query->where('area', strtoupper($request->input('area')));
                })
            ],
        ], [
            'area.required' => 'El campo Área es obligatorio.',
            'area.unique' => 'El nombre del área ya está en uso.',
        ]);

        $area = new Area();
        $area->area = strtoupper($request->input('area'));

        $area->save();

        return redirect()->route("areas.index")->with('success', 'Área creada correctamente');
    }

    /**
     * Muestra un recurso específico.
     */
    public function show($id)
    {
        $area = Area::find($id);

        if (!$area) {
            return redirect()->route("areas.index")->with('error', 'Área no encontrada');
        }

        return view("areas.show", compact("area"));
    }

    /**
     * Muestra el formulario para editar un recurso existente.
     */
    public function edit($id)
    {
        $area = Area::find($id);

        if (!$area) {
            return redirect()->route("areas.index")->with('error', 'Área no encontrada');
        }

        return view("areas.edit", compact("area"));
    }

    /**
     * Actualiza un recurso existente en el almacenamiento.
     */
    public function update(Request $request, $id)
    {
        $area = Area::find($id);

        if (!$area) {
            return redirect()->route("areas.index")->with('error', 'Área no encontrada');
        }
    
        $request->validate([
            "area" => "required",
        ]);
    
        $area->area = strtoupper($request->input('area'));
    
        $area->save();
    
        return redirect()->route("areas.index")->with('success', 'Área actualizada correctamente');
    }

    /**
     * Elimina un recurso específico.
     */
    public function destroy($id)
    {
        $area = Area::find($id);

        if (!$area) {
            return redirect()->route("areas.index")->with('error', 'Área no encontrada');
        }

        $area->delete();

        return redirect()->route("areas.index")->with('success', 'Área eliminada correctamente');
    }

    public function buscarAreas(Request $request)
    {
        $filtro = $request->input('filtro');
    
        $areas = Area::where('area', 'like', '%' . $filtro . '%')
            ->paginate(10);
    
        return view('areas.partials.resultados', compact('areas'));
    }
}
