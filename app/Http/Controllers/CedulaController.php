<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cedula;
use App\Models\Maestro;
use App\Models\DatosLaborales;
use App\Models\Curso;

class CedulaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'rfc' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:255',
            'email' => 'required|string|max:255',
            'carrera_nombre' => 'nullable|string|max:255',
            'tipo_puesto' => 'required|string',
            'unidad_responsable' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'puesto_actual' => 'nullable|string|max:255',
            'nombre_jefe' => 'required|string|max:255',
            'domicilio_oficial' => 'required|string|max:255',
            'telefono_oficial' => 'required|string|max:255',
            'extension' => 'nullable|string|max:255',
            'horario' => 'required|string|max:255',
            'nombre_evento' => 'required|string|max:255',
            'nombre_instructor' => 'required|string|max:255',
            'fecha_realizacion' => 'required|date',
            'horario_evento' => 'required|string|max:255',
            'sede' => 'required|string|max:255',
        ]);

        Cedula::create($validated);

        return redirect()->back()->with('success', '¡Cédula enviada exitosamente!');
    }

    public function buscarPorMatricula($matricula)
    {
        $maestro = Maestro::where('matricula', $matricula)->first();
    
        if (!$maestro) {
            return response()->json(['found' => false]);
        }
    
        $laborales = DatosLaborales::where('maestro_id', $maestro->id)->first();
    
        return response()->json([
            'found' => true,
            'maestro' => $maestro,
            'laborales' => $laborales
        ]);
    } 


    public function create()
    {
        $cursos = Curso::all();
        return view('record', compact('cursos'));
    }
}