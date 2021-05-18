<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteraccioModel extends Model
{
    use HasFactory;
    protected $table = 'interaccio';
    protected $primaryKey = 'id';
    protected $fillable = ['id_Usuari','id_Contingut','comentario','megusta','created_at','updated_at'];
}
