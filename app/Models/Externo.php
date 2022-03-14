<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Externo extends Model
{
    use HasFactory;
    protected $fillable = ['document_id','nombre','ruc','celular','correo'];

    //uuno a uno inversa
    public function Document()
    {
        return $this->belongsTo(Document::class);
    }
}
