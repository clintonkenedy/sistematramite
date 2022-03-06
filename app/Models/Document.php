<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_id', 'titulo','contenido'];

    //relacion uno a muchos pero inversa
    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }
    //relacion uno a uno
    public function estudiante()
    {
        return $this->hasOne(Estudiante::class);
    }
    //relacion muchos a muchos
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

}
