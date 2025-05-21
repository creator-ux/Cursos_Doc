<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    //
    public function getCurso($id)
{
    $curso = Curso::findOrFail($id);
    return response()->json($curso);
}

}
