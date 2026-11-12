<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $fillable = ['codigo','nombre','categoria','precio','costo','inventario',
        'imagen','laboratorio','fecha_vencimiento','fecha_registro','numero_lote'];
    protected $casts = ['fecha_vencimiento'=>'date','fecha_registro'=>'date'];
}