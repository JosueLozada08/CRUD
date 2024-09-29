<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    use HasFactory;
    protected $table = 'persona'; /* base de datos  */
    protected $fillable = ['nombre', 'edad', 'ocupacion' ];

    public $timestamps = false; /* desactivar rehistro de fecha de laravel  */
}
