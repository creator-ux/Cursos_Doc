<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Cursos;

class CursoController extends Controller
{
    //
    public function getCurso($id)
{
    $curso = Curso::findOrFail($id);
    return response()->json($curso);
}

//Controla eemm procesa y guarda las tareas
public function subirDocumento(Request $request, Cursos $curso)
{
    $request->validate([
        'documento' => 'required|mimes:pdf|max:2048',
    ]);

    // Opcional: borrar documento anterior si existe
    if ($curso->documento) {
        Storage::delete($curso->documento);
    }

    $path = $request->file('documento')->store('documentos');

    $curso->documento = $path;
    $curso->save();

    return back()->with('success', 'Documento subido correctamente.');
}

//para qye vean las tareas
public function tareasSubidasUsuario()
{
    $usuario = auth()->user();

    // Suponiendo que el usuario tiene cursos relacionados
    $cursos = $usuario->cursos()->whereNotNull('documento')->get();

    return view('dashboard.tareas-subidas', compact('cursos'));
}

//
public function verTareasCursos()
{
    // Obtener todos los cursos, sin importar si tienen documento o no
    $cursos = \App\Models\Cursos::all();

    return view('dashboard.tareas-cursos', compact('cursos'));
}

}
