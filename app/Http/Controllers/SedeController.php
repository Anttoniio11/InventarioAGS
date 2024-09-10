<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SedeController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index()
    {
        $sedes = Sede::paginate(10);
        return view("sedes.index", compact("sedes"));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view("sedes.create");
    }

    /**
     * Almacena un nuevo recurso en el almacenamiento.
     */
    public function store(Request $request)
    {
        // Validación de los campos del formulario
        $request->validate([
            'nit' => 'required|unique:sedes,nit',
            'razon_social' => 'required',
            'departamento' => 'required',
            'municipio' => 'required',
        ], [
            'nit.required' => 'El campo NIT es obligatorio.',
            'nit.unique' => 'El NIT ya está en uso.',
            'razon_social.required' => 'El campo Razón Social es obligatorio.',
            'departamento.required' => 'El campo Departamento es obligatorio.',
            'municipio.required' => 'El campo Municipio es obligatorio.',
        ]);

        $sede = new Sede();
        $sede->nit = $request->input('nit');
        $sede->razon_social = $request->input('razon_social');
        $sede->departamento = $request->input('departamento');
        $sede->municipio = $request->input('municipio');

        $sede->save();

        return redirect()->route("sedes.index")->with('success', 'Sede creada correctamente');
    }

    /**
     * Muestra un recurso específico.
     */
    public function show($id)
    {
        $sede = Sede::find($id);

        if (!$sede) {
            return redirect()->route("sedes.index")->with('error', 'Sede no encontrada');
        }

        return view("sedes.show", compact("sede"));
    }

    /**
     * Muestra el formulario para editar un recurso existente.
     */
    public function edit($id)
    {
        $sede = Sede::find($id);

        if (!$sede) {
            return redirect()->route("sedes.index")->with('error', 'Sede no encontrada');
        }

        return view("sedes.edit", compact("sede"));
    }

    /**
     * Actualiza un recurso existente en el almacenamiento.
     */
    public function update(Request $request, $id)
    {
        $sede = Sede::find($id);

        if (!$sede) {
            return redirect()->route("sedes.index")->with('error', 'Sede no encontrada');
        }
    
        $request->validate([
            "nit" => [
                'required',
                Rule::unique('sedes')->ignore($sede->id),
            ],
            "razon_social" => "required",
            "departamento" => "required",
            "municipio" => "required",
        ]);
    
        $sede->nit = $request->input('nit');
        $sede->razon_social = $request->input('razon_social');
        $sede->departamento = $request->input('departamento');
        $sede->municipio = $request->input('municipio');
    
        $sede->save();
    
        return redirect()->route("sedes.index")->with('success', 'Sede actualizada correctamente');
    }

    /**
     * Elimina un recurso específico.
     */
    public function destroy($id)
    {
        $sede = Sede::find($id);

        if (!$sede) {
            return redirect()->route("sedes.index")->with('error', 'Sede no encontrada');
        }

        $sede->delete();

        return redirect()->route("sedes.index")->with('success', 'Sede eliminada correctamente');
    }

    public function buscarSedes(Request $request)
    {
        $filtro = $request->input('filtro');
    
        $sedes = Sede::where('nit', 'like', '%' . $filtro . '%')
            ->orWhere('razon_social', 'like', '%' . $filtro . '%')
            ->orWhere('departamento', 'like', '%' . $filtro . '%')
            ->orWhere('municipio', 'like', '%' . $filtro . '%')
            ->paginate(10);
    
        return view('sedes.partials.resultados', compact('sedes'));
    }
}
