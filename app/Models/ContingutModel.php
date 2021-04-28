<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContingutModel extends Model
{
    use HasFactory;
    protected $table = 'contingut';
    protected $primaryKey = 'id';
    protected $fillable = ['tipus','created_at','updated_at'];
}
