<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Propietario;
 
class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamentos.index', compact('departamentos'));
    }
 
    

    public function create()
    {
        $propietarios = Propietario::all(); // Obtén todos los registros de la tabla Pais
 
        return view('departamentos.create', compact('propietarios'));
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'propietario_id' => 'required|required|max:3',
            'direccion' => 'required|string|max:255',
            'renta' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);
 
        $departamento = Departamento::create($request->only('propietario_id','direccion','renta'));
 
        return redirect()->route('departamentos.index')->with('success', 'Departamento creado exitosamente');
    }
 
    public function show($id)
    {
        $departamento = Departamento::findOrFail($id);
        return view('departamentos.show', compact('departamento'));
    }
 
    public function edit($id)
    {
        $departamento = Departamento::findOrFail($id);
        return view('departamentos.edit', compact('departamento'));
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'direccion' => 'required',
            'renta' => 'required|numeric',
        ]);

        $departamento = Departamento::findOrFail($id);
        $departamento->update($request->only('direccion', 'renta'));

        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado exitosamente');
    }

 
    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('success', 'País eliminado exitosamente');
    }
}