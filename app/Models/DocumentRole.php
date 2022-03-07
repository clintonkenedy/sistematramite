<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class DocumentRole extends Model
{   
    protected $table = 'document_role';
    use HasFactory;
    protected $fillable = ['documento_id','role_id','estado'];
    //relacion uno a muchos pero inversa
    public function document(){
        return $this->belongsTo(Document::class);
    }
    //relacion uno a muchos pero inversa
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
