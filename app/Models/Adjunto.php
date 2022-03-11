<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adjunto extends Model
{
    use HasFactory;
    protected $fillable = [];
    //uno a muchos inversa
    public function documento(){
        return $this->belongsTo(Document::class);
    }
    public function getGetContenidoAttribute(){
        return url("storage/$this->contenido");
    }

    


}
