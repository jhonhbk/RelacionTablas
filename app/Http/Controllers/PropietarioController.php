<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Propietario;
 
class PropietarioController extends Controller
{
    public function index()
    {
        $propietarios = Propietario::all();
        return view('propietarios.index', compact('propietarios'));
    }
 
    public function create()
    {
        return view('propietarios.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|max:3',
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:propietarios,email',
        ]);

        $propietario = Propietario::create($request->only('id','nombre', 'email'));

        return redirect()->route('propietarios.index')->with('success', 'Propietario creado exitosamente');
    }

 
    public function show($id)
    {
        $propietario = Propietario::findOrFail($id);
        return view('propietarios.show', compact('propietario'));
    }
 
    public function edit($id)
    {
        $propietario = Propietario::findOrFail($id);
        return view('propietarios.edit', compact('propietario'));
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:propietarios,nombre,' . $id,
        ]);
 
        $propietario = Propietario::findOrFail($id);
        $propietario->update($request->only('nombre'));
 
        return redirect()->route('propietarios.index')->with('success', 'País actualizado exitosamente');
    }
 
    public function destroy($id)
    {
        $propietario = Propietario::findOrFail($id);
        $propietario->delete();
        return redirect()->route('propietarios.index')->with('success', 'País eliminado exitosamente');
    }
}