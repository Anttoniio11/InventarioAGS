<?php

namespace App\Http\Controllers;

use App\Models\CategoriaInsumo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaInsumoController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index()
    {
        $categorias = CategoriaInsumo::paginate(10);
        return view("categorias.categorias_insumos.index", compact("categorias"));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view("categorias.categorias_insumos.create");
    }

    /**
     * Almacena un nuevo recurso en el almacenamiento.
     */
    public function store(Request $request)
    {
        // Validación de los campos del formulario
        $request->validate([
            'codigo' => [
                'required',
                'unique:categorias_insumos,codigo',
            ],
            'categoria' => [
                'required',
                Rule::unique('categorias_insumos')->where(function ($query) use ($request) {
                    return $query->where('categoria', strtoupper($request->input('categoria')));
                })
            ],
        ], [
            'codigo.required' => 'El campo Código es obligatorio.',
            'codigo.unique' => 'El código de la categoría ya está en uso.',
            'categoria.required' => 'El campo Categoría es obligatorio.',
            'categoria.unique' => 'El nombre de la categoría ya está en uso.',
        ]);

        $categoria = new CategoriaInsumo();
        $categoria->codigo = $request->input('codigo');
        $categoria->categoria = strtoupper($request->input('categoria'));

        $categoria->save();

        return redirect()->route("categorias.categorias_insumos.index")->with('success', 'Categoría de insumo creada correctamente');
    }

    /**
     * Muestra un recurso específico.
     */
    public function show($id)
    {
        $categoria = CategoriaInsumo::find($id);

        if (!$categoria) {
            return redirect()->route("categorias.categorias_insumos.index")->with('error', 'Categoría de insumo no encontrada');
        }

        return view("categorias.categorias_insumos.show", compact("categoria"));
    }

    /**
     * Muestra el formulario para editar un recurso existente.
     */
    public function edit($id)
    {
        $categoria = CategoriaInsumo::find($id);

        if (!$categoria) {
            return redirect()->route("categorias.categorias_insumos.index")->with('error', 'Categoría de insumo no encontrada');
        }

        return view("categorias.categorias_insumos.edit", compact("categoria"));
    }

    /**
     * Actualiza un recurso existente en el almacenamiento.
     */
    public function update(Request $request, $idCategoria)
    {
        $categoria = CategoriaInsumo::find($idCategoria);

        if (!$categoria) {
            return redirect()->route("categorias.categorias_insumos.index")->with('error', 'Categoría de insumo no encontrada');
        }
    
        $request->validate([
            "codigo" => "required",
            "categoria" => "required",
        ]);
    
        $categoria->codigo = $request->input('codigo');
        $categoria->categoria = strtoupper($request->input('categoria'));
    
        $categoria->save();
    
        return redirect()->route("categorias.categorias_insumos.index")->with('success', 'Categoría de insumo actualizada correctamente');
    }

    /**
     * Elimina un recurso específico.
     */
    public function destroy($id)
    {
        $categoria = CategoriaInsumo::find($id);

        if (!$categoria) {
            return redirect()->route("categorias.categorias_insumos.index")->with('error', 'Categoría de insumo no encontrada');
        }

        $categoria->delete();

        return view("categorias.categorias_insumos.index")->with('success', 'Categoría de insumo eliminada correctamente');
    }

    public function buscarCategorias(Request $request)
    {
        $filtro = $request->input('filtro');
    
        $categorias = CategoriaInsumo::where('codigo', 'like', '%' . $filtro . '%')
            ->orWhere('categoria', 'like', '%' . $filtro . '%')
            ->paginate(10);
    
        return redirect()->route('categorias_insumos.partials.resultados', compact('categorias'));
    }
}
