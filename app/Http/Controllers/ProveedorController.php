<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Proveedore;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedore::paginate(10);
        return view("proovedor.index", compact("proveedores"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("proveedor.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nit' => [
                'required',
                Rule::unique('proveedores')->where(function ($query) use ($request) {
                    return $query->where('nit', strtoupper($request->input('nit')));
                })
            ],
            'nombre' => 'string|required',
            'telefono' => 'string|max:20',
            'email' => 'required',
            'direccion' => 'string|required',
        ], [
            'nit.required' => 'El campo nit es obligatorio.',
            'nit.unique' => 'El nit ya está en uso.',
        ]);


        $proveedor = new Proveedore();
        $proveedor->nit = strtoupper($request->input('nit'));

        $proveedor->save();

        return redirect()->route('proveedor.index')->with('success', 'Proveedor creado correctamente');
   
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $proveedor = Proveedore::find($id);

        if (!$proveedor) {
            return view("proveedor.index")->with('error', 'Proveedor no encontrado');
        }

        return view("proveedor.show", compact("proveedor"));
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proveedor = Proveedore::find($id);

        if (!$proveedor) {
            return view("proveedor.index")->with('error', 'Proveedor no encontrado');
        }

        return view("proveedor.edit", compact("proveedor"));
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idProveedor)
    {
        $proveedor = Proveedore::find($idProveedor);

        if (!$proveedor) {
            return view("proveedor.index")->with('error', 'Proveedor no encontrado');
        }

        $request->validate([
            "categoria" => "required",
            'nombre' => 'string|required',
            'telefono' => 'string|max:20',
            'email' => 'required',
            'direccion' => 'string|required',
        ]);

        $proveedor->nit = strtoupper($request->input('nit'));

        $proveedor->save();

        return redirect()->route('proveedor.index')->with('success', 'Proveedor actualizado correctamente');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor = Proveedore::find($id);

        if (!$proveedor) {
            return redirect()->route('proveedor.index')->with('success', 'No se logró encontrar la categoría tecnológica');
     }

        $proveedor->delete();

        return redirect()->route('proveedor.index')->with('success', 'Categoría tecnológica eliminada correctamente');
   
    }
}
