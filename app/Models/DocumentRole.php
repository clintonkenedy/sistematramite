<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRole extends Model
{   
    protected $table = 'document_role';
    use HasFactory;
    protected $fillable = ['documento_id','role_id'];
}
