<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatosLaborales extends Model
{
    //
    public function maestro()
{
    return $this->belongsTo(Maestro::class);
}

}
