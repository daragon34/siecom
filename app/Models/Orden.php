<?php

namespace App\Models;

use App\Models\User;
use App\Models\Shipping;
use App\Models\OrdenItem;
use App\Models\Transaccion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orden extends Model
{
    protected $table = 'ordens';

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function ordenItem(){
        return $this->hasMany(OrdenItem::class);
    }

    public function envio(){
        return $this->hasOne(Shipping::class);
    }

    public function transaccion(){
        return $this->hasOne(Transaccion::class);
    }
    use HasFactory;
}
