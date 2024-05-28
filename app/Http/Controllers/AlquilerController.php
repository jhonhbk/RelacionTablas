<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Alquiler;
use App\Inquilino_Alquiler;
use App\Models\Inquilino;
use App\Models\Departamento;
/*use App\Models\Perfil;*/
 
class AlquilerController extends Controller
{
    public function index()
    {
        $alquileres = Alquiler::with('inquilino', 'departamento')->get();
        return view('alquileres.index', compact('alquileres'));
    }
 
    public function create()
    {
        $inquilinos = Inquilino::all(); // Obtén todos los registros de la tabla Inquilino
        $departamentos = Departamento::all(); // Obtén todos los registros de la tabla Departamento

        return view('alquileres.create', compact('inquilinos', 'departamentos'));
    }
    

 
    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);
 
        $alquiler = Alquiler::create([
            'monto' => $request->input('monto'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_fin' => $request->input('fecha_fin'),
        ]);
 
        
 
        return redirect()->route('alquileres.index')->with('success', 'Alquiler creado exitosamente');
    }
 
    public function show($id)
    {
        $alquiler = Alquiler::findOrFail($id);
        return view('alquileres.show', compact('alquiler'));
    }
 
    

    public function edit($id)
    {
        $alquiler = Alquiler::findOrFail($id);
        return view('alquileres.edit', compact('alquiler'));
    }

 
    public function update(Request $request, $id)
    {
        $request->validate([
            'monto' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        $alquiler = Alquiler::findOrFail($id);
        $alquiler->update($request->only('monto', 'fecha_inicio','fecha_fin'));

        return redirect()->route('alquileres.index')->with('success', 'Alquiler actualizado exitosamente');
    }
 
    public function destroy($id)
    {
        $alquiler = Alquiler::findOrFail($id);
        
        if ($alquiler->perfil) {
            $alquiler->perfil->delete();
        }
        
        $alquiler->delete();
        return redirect()->route('alquileres.index')->with('success', 'Alquiler eliminado exitosamente');
    }

}