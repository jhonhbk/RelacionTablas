<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Inquilino;
use App\Models\Pais;
use App\Models\Perfil;
 
class InquilinoController extends Controller
{
    public function index()
    {
        $inquilinos = Inquilino::all();
        return view('inquilinos.index', compact('inquilinos'));
    }
 
    public function create()
    {
        $inquilinos = Inquilino::all(); // Obtén todos los registros de la tabla Pais
 
        return view('inquilinos.create', compact('inquilinos'));
    }
 
    //public function store(Request $request)
    //{
    //    $inquilino = Inquilino::create($request->all());
    //    $inquilino->perfil()->create($request->only('bio'));
    //    return redirect()->route('inquilinos.index')->with('success', 'Inquilino creado exitosamente');
    //}
 
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo_electronico' => 'required|email|unique:inquilinos',
        ]);
 
        $inquilino = Inquilino::create([
            'nombre' => $request->input('nombre'),
            'correo_electronico' => $request->input('correo_electronico'),
        ]);
 
 
        return redirect()->route('inquilinos.index')->with('success', 'Inquilino creado exitosamente');
    }
 
    public function show($id)
    {
        $inquilino = Inquilino::findOrFail($id);
        return view('inquilinos.show', compact('inquilino'));
    }
 
    public function edit($id)
    {
        $inquilino = Inquilino::findOrFail($id);
        return view('inquilinos.edit', compact('inquilino'));
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'correo_electronico' => 'required',
        ]);

        $inquilino = Inquilino::findOrFail($id);
        $inquilino->update($request->only('nombre', 'correo_electronico'));

        return redirect()->route('inquilinos.index')->with('success', 'Inquilino actualizado exitosamente');
    }
 
    
    public function destroy($id)
    {
        $inquilino = Inquilino::findOrFail($id);
        
        if ($inquilino->perfil) {
            $inquilino->perfil->delete();
        }
        
        $inquilino->delete();
        return redirect()->route('inquilinos.index')->with('success', 'Inquilino eliminado exitosamente');
    }
}