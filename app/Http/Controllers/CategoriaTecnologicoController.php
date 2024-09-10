<?php

namespace App\Http\Controllers;

use App\Models\CategoriaTecnologico;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaTecnologicoController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index()
    {
        $categorias = CategoriaTecnologico::paginate(10);
        return view("categorias.categorias_tecnologicos.index", compact("categorias"));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view("categorias.categorias_tecnologicos.create");
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
                Rule::unique('categorias_tecnologicos')->where(function ($query) use ($request) {
                    return $query->where('categoria', strtoupper($request->input('categoria')));
                })
            ],
        ], [
            'categoria.required' => 'El campo Categoría es obligatorio.',
            'categoria.unique' => 'El nombre de la categoría ya está en uso.',
        ]);

        
        $categoria = new CategoriaTecnologico();
        $categoria->categoria = strtoupper($request->input('categoria'));

        $categoria->save();

        return view("categorias.categorias_tecnologicos.index")->with('success', 'Categoría tecnológica creada correctamente');
    }

    /**
     * Muestra un recurso específico.
     */
    public function show($id)
    {
        $categoria = CategoriaTecnologico::find($id);

        if (!$categoria) {
            return view("categorias.categorias_tecnologicos.index")->with('error', 'Categoría tecnológica no encontrada');
        }

        return view("categorias.categorias_tecnologicos.show", compact("categoria"));
    }

    /**
     * Muestra el formulario para editar un recurso existente.
     */
    public function edit($id)
    {
        $categoria = CategoriaTecnologico::find($id);

        if (!$categoria) {
            return view("categorias.categorias_tecnologicos.index")->with('error', 'Categoría tecnológica no encontrada');
        }

        return view("categorias.categorias_tecnologicos.edit", compact("categoria"));
    }

    /**
     * Actualiza un recurso existente en el almacenamiento.
     */
    public function update(Request $request, $idCategoria)
    {
        $categoria = CategoriaTecnologico::find($idCategoria);

        if (!$categoria) {
            return view("categorias.categorias_tecnologicos.index")->with('error', 'Categoría tecnológica no encontrada');
        }
    
        $request->validate([
            "categoria" => "required",
        ]);
    
        $categoria->categoria = strtoupper($request->input('categoria'));
    
        $categoria->save();
    
        return view("categorias.categorias_tecnologicos.index")->with('success', 'Categoría tecnológica actualizada correctamente');
    }

    /**
     * Elimina un recurso específico.
     */
    public function destroy($id)
    {
        $categoria = CategoriaTecnologico::find($id);

        if (!$categoria) {
            return view("categorias.categorias_tecnologicos.index")->with('error', 'Categoría tecnológica no encontrada');
        }

        $categoria->delete();

        return view("categorias.categorias_tecnologicos.index")->with('success', 'Categoría tecnológica eliminada correctamente');
    }

    public function buscarCategorias(Request $request)
    {
        $filtro = $request->input('filtro');
    
        $categorias = CategoriaTecnologico::where('categoria', 'like', '%' . $filtro . '%')
            ->paginate(10);
    
        return view('categorias.categorias_tecnologicos.resultados', compact('categorias'));
    }
}
