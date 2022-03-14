<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['rol_id','tipo_id','codigo_tramite', 'titulo','contenido'];

    //relacion uno a muchos pero inversa
    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }
    //relacion uno a uno
    public function estudiante()
    {
        return $this->hasOne(Estudiante::class);
    }
    //relacion uno a uno
    public function docente()
    {
        return $this->hasOne(Docente::class);
    }
    //relacion uno a uno
    public function externo()
    {
        return $this->hasOne(Externo::class);
    }
    //relacion muchos a muchos
    // public function roles(){
    //     return $this->belongsToMany(Role::class);
    // }
    //relacion uno a muchos
    // public function documentroles(){
    //     return $this->hasMany(DocumentRole::class);
    // }
    //relacion uno a muchos pero inversa
    public function rol(){
        return $this->belongsTo(Role::class);
    }
    //relacion uno a muchos
    public function seguimientos(){
        return $this->hasMany(Seguimiento::class);
    }
    //uno a muchos
    public function adjuntos(){
        return $this->hasMany(Adjunto::class);
    }


}
