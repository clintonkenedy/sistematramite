<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_id', 'titulo','contenido'];

    //relacion uno a muchos pero inversa
    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }
}
