<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DerechosAutorModel extends Model
{
    use HasFactory;
    protected $table = 'dret_autor';
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $hidden = ['created_at','updated_at'];
}
