<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $fillable = ['title'];
    
    //relacion uno a muchos
    public function documents(){
        return $this->hasMany(Document::class);
    }
}
