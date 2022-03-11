<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;
    protected $fillable = ['document_id','estado','oficina','oficina_derivada'];

    //uno a muchos pero inversa

    public function document(){
        return $this->belongsTo(Document::class);
    }
}
