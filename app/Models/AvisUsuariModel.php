<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvisUsuariModel extends Model
{
    use HasFactory;
    protected $table = 'avis_usuari';
    protected $fillable = ['id_usuari','id_avis','created_at','updated_at'];
}
