<?php

namespace App\Http\Controllers;

use App\Models\CategoriaMedico;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaMedicoController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index()
    {
        $categorias = CategoriaMedico::paginate(10);
        return view("categorias.categorias_medicos.index", compact("categorias"));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view("categorias.categorias_medicos.create");
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
                'unique:categorias_medicos,codigo',
            ],
            'categoria' => [
                'required',
                Rule::unique('categorias_medicos')->where(function ($query) use ($request) {
                    return $query->where('categoria', strtoupper($request->input('categoria')));
                })
            ],
        ], [
            'codigo.required' => 'El campo Código es obligatorio.',
            'codigo.unique' => 'El código de la categoría ya está en uso.',
            'categoria.required' => 'El campo Categoría es obligatorio.',
            'categoria.unique' => 'El nombre de la categoría ya está en uso.',
        ]);

        $categoria = new CategoriaMedico();
        $categoria->codigo = $request->input('codigo');
        $categoria->categoria = strtoupper($request->input('categoria'));

        $categoria->save();

        return view("categorias.categorias_medicos.index")->with('success', 'Categoría médica creada correctamente');
    }

    /**
     * Muestra un recurso específico.
     */
    public function show($id)
    {
        $categoria = CategoriaMedico::find($id);

        if (!$categoria) {
            return redirect()->route("categorias.categorias_medicos.index")->with('error', 'Categoría médica no encontrada');
        }

        return view("categorias.categorias_medicos.show", compact("categoria"));
    }

    /**
     * Muestra el formulario para editar un recurso existente.
     */
    public function edit($id)
    {
        $categoria = CategoriaMedico::find($id);

        if (!$categoria) {
            return redirect()->route("categorias.categorias_medicos.index")->with('error', 'Categoría médica no encontrada');
        }

        return view("categorias.categorias_medicos.edit", compact("categoria"));
    }

    /**
     * Actualiza un recurso existente en el almacenamiento.
     */
    public function update(Request $request, $idCategoria)
    {
        $categoria = CategoriaMedico::find($idCategoria);

        if (!$categoria) {
            return redirect()->route("categorias.categorias_medicos.index")->with('error', 'Categoría médica no encontrada');
        }
    
        $request->validate([
            "codigo" => "required",
            "categoria" => "required",
        ]);
    
        $categoria->codigo = $request->input('codigo');
        $categoria->categoria = strtoupper($request->input('categoria'));
    
        $categoria->save();
    
        return view("categorias.categorias_medicos.index")->with('success', 'Categoría médica actualizada correctamente');
    }

    /**
     * Elimina un recurso específico.
     */
    public function destroy($id)
    {
        $categoria = CategoriaMedico::find($id);

        if (!$categoria) {
            return redirect()->route("categorias.categorias_medicos.index")->with('error', 'Categoría médica no encontrada');
        }

        $categoria->delete();

        return view("categorias.categorias_medicos.index")->with('success', 'Categoría médica eliminada correctamente');
    }

    public function buscarCategorias(Request $request)
    {
        $filtro = $request->input('filtro');
    
        $categorias = CategoriaMedico::where('codigo', 'like', '%' . $filtro . '%')
            ->orWhere('categoria', 'like', '%' . $filtro . '%')
            ->paginate(10);
    
        return view('categorias_medicos.partials.resultados', compact('categorias'));
    }
}
