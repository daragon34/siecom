<?php

namespace App\Models;

use App\Models\Orden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaccion extends Model
{
    use HasFactory;
    protected $table = 'transaccions';
    
    public function orden(){
        return $this->belongsTo(Orden::class);
    }
}
