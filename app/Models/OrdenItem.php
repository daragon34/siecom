<?php

namespace App\Models;

use App\Models\Orden;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrdenItem extends Model
{
    use HasFactory;
    protected $table = 'orden_items';
    
    public function orden(){
        return $this->belongsTo(Orden::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
