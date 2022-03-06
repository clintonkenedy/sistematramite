<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $fillable = ['documento_id','codigo_tramite','nombre','apellidos','dni'];
    //uuno a uno inversa
    public function Document()
    {
        return $this->belongsTo(Document::class);
    }
}
