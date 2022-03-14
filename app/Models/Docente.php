<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $fillable = ['document_id','nombre','apellido_paterno','apellido_materno','dni','direccion','celular','correo'];

    //uuno a uno inversa
    public function Document()
    {
        return $this->belongsTo(Document::class);
    }
}
