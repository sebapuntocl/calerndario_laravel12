<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use Carbon\Carbon;

class ActividadController extends Controller
{
    public function index(Request $request)
    {
        $mes = $request->get('mes', now()->month);
        $anio = $request->get('anio', now()->year);
        $actividades = Actividad::whereMonth('fecha', $mes)
                                ->whereYear('fecha', $anio)
                                ->get();

        return view('calendario', compact('actividades', 'mes', 'anio'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:100',
            'fecha' => 'required|date',
            'descripcion' => 'nullable|string',
        ]);

        Actividad::create($request->only('titulo', 'fecha', 'hora', 'descripcion'));

        return redirect()->back()->with('success', 'Actividad creada exitosamente.');
    }

    public function destroy($id)
    {
        Actividad::destroy($id);
        return redirect()->back()->with('success', 'Actividad eliminada.');
    }

    public function edit($id)
    {
        $actividad = Actividad::findOrFail($id);
        return view('actividades.editar', compact('actividad'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'nullable',
            'descripcion' => 'nullable|string'
        ]);

        $actividad = Actividad::findOrFail($id);
        $actividad->update($request->only('titulo', 'fecha', 'hora', 'descripcion'));

        return redirect()->route('actividades.index')->with('success', 'Actividad actualizada correctamente.');
    }

}
