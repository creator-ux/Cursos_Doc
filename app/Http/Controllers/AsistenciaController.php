<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Maestro;
use App\Models\Periodo;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    // Registrar asistencia masiva
    public function store(Request $request)
    {
        $request->validate([
            'periodo_id' => 'required|exists:periodos,id',
            'fecha' => 'required|date',
            'asistio_default' => 'required|in:presente,ausente,justificado',
        ]);

        $maestros = Periodo::findOrFail($request->periodo_id)->maestros;

        foreach ($maestros as $maestro) {
            Asistencia::updateOrCreate(
                [
                    'maestro_id' => $maestro->id,
                    'periodo_id' => $request->periodo_id,
                    'fecha' => $request->fecha,
                ],
                [
                    'asistio' => $request->asistio_default,
                ]
            );
        }

        return redirect()->back()->with('success', 'Asistencia masiva registrada correctamente.');
    }

    // Registrar asistencia individual
    public function storeIndividual(Request $request)
    {
        $request->validate([
            'maestro_id' => 'required|exists:maestros,id',
            'periodo_id' => 'required|exists:periodos,id',
            'fecha' => 'required|date',
            'asistio' => 'required|in:presente,ausente,justificado',
        ]);

        Asistencia::updateOrCreate(
            [
                'maestro_id' => $request->maestro_id,
                'periodo_id' => $request->periodo_id,
                'fecha' => $request->fecha,
            ],
            [
                'asistio' => $request->asistio,
                'observaciones' => $request->observaciones ?? null,
            ]
        );

        return redirect()->back()->with('success', 'Asistencia individual registrada correctamente.');
    }

    // Ver días de asistencia registrados
    public function verDiasRegistrados($periodoId)
    {
        $periodo = Periodo::findOrFail($periodoId);

        $asistenciasPorFecha = Asistencia::where('periodo_id', $periodoId)
            ->with('maestro')
            ->orderBy('fecha', 'desc')
            ->get()
            ->groupBy('fecha');

        return view('periodos.dias', compact('periodo', 'asistenciasPorFecha'));
    }
}