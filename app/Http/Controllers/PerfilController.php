<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        $perfiles = Perfil::with('persona')->get();
        return view('perfiles.index', compact('perfiles'));
    }

    public function create()
    {
        $personas = Persona::all();
        return view('perfiles.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bio' => 'required|string|max:8|exists:personas,dni',
            'usuario_id' => 'required|boolean',
        ]);

        Perfil::create($request->all());

        return redirect()->route('perfiles.index')->with('success', 'Perfil creado exitosamente.');
    }

    public function show(Perfil $docente)
    {
        return view('perfiles.show', compact('docente'));
    }


    public function edit($id)
    {
        $docente = Perfil::findOrFail($id);
        $personas = Persona::all();

        return view('perfiles.edit', compact('docente', 'personas'));
    }

    public function update(Request $request, $id)
    {
        $docente = Perfil::findOrFail($id);
        $request->validate([
            'persona_dni' => 'required|string|max:8|exists:personas,dni',
            'estado' => 'required|boolean',
        ]);

        $docente->update($request->all());

        return redirect()->route('perfiles.index')->with('success', 'Perfil actualizado correctamente.');
    }

    public function destroy(Perfil $docente)
    {
        $docente->delete();

        return redirect()->route('perfiles.index')->with('success', 'Perfil eliminado exitosamente.');
    }
}
