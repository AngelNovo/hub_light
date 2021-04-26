<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipus_usuari extends Model
{
    use HasFactory;

    protected $table = 'tipus_usuari';
    protected $primaryKey = 'id';
    protected $fillable = ['tipus'];
}
