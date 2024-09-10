<?php

namespace App\Http\Controllers;

use App\Models\CategoriaFisico;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaFisicoController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index()
    {
        $categorias = CategoriaFisico::paginate(10);
        return view("categorias.index", compact("categorias"));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view("categorias.create");
    }

    /**
     * Almacena un nuevo recurso en el almacenamiento.
     */
    public function store(Request $request)
    {
        // Validación de los campos del formulario
        $request->validate([
            'categoria' => [
                'required',
                Rule::unique('categorias_fisicos')->where(function ($query) use ($request) {
                    return $query->where('categoria', strtoupper($request->input('categoria')));
                })
            ],
        ], [
            'categoria.required' => 'El campo Categoría es obligatorio.',
            'categoria.unique' => 'El nombre de esta categoría ya está en uso.',
        ]);

        $categoria = new CategoriaFisico();
        $categoria->categoria = strtoupper($request->input('categoria'));

        $categoria->save();

        return redirect()->route("categorias.index")->with('success', 'Categoría creada correctamente');
    }

    /**
     * Muestra un recurso específico.
     */
    public function show($id)
    {
        $categoria = CategoriaFisico::find($id);

        if (!$categoria) {
            return redirect()->route("categorias.index")->with('error', 'Categoría no encontrada');
        }

        return view("categorias.show", compact("categoria"));
    }

    /**
     * Muestra el formulario para editar un recurso existente.
     */
    public function edit($id)
    {
        $categoria = CategoriaFisico::find($id);

        if (!$categoria) {
            return redirect()->route("categorias.index")->with('error', 'Categoría no encontrada');
        }

        return view("categorias.edit", compact("categoria"));
    }

    /**
     * Actualiza un recurso existente en el almacenamiento.
     */
    public function update(Request $request, $idCategoria)
    {
        $categoria = CategoriaFisico::find($idCategoria);

        if (!$categoria) {
            return redirect()->route("categorias.index")->with('error', 'Categoría no encontrada');
        }
    
        $request->validate([
            "categoria" => "required",
        ]);
    
        $categoria->categoria = strtoupper($request->input('categoria'));
    
        $categoria->save();
    
        return redirect()->route("categorias.index")->with('success', 'Categoría actualizada correctamente');
    }

    /**
     * Elimina un recurso específico.
     */
    public function destroy($id)
    {
        $categoria = CategoriaFisico::find($id);

        if (!$categoria) {
            return redirect()->route("categorias.index")->with('error', 'Categoría no encontrada');
        }

        $categoria->delete();

        return redirect()->route("categorias.index")->with('success', 'Categoría eliminada correctamente');
    }

    public function buscarCategorias(Request $request)
    {
        $filtro = $request->input('filtro');
    
        $categorias = CategoriaFisico::where('categoria', 'like', '%' . $filtro . '%')
            ->paginate(10);
    
        return view('categorias.partials.resultados', compact('categorias'));
    }
}
