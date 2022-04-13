<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actividades extends Model
{
    //use HasFactory;
    protected $table = 'actividades';
    protected $primaryKey = 'id';
    protected $fillable = [
        'programa_id', 'descripcion', 'fecha'
    ];

    public $timestamps = false;
}
