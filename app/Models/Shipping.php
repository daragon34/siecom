<?php

namespace App\Models;

use App\Models\Orden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipping extends Model
{
    use HasFactory;
    protected $table = 'shippings';
    
    public function orden(){
        return $this->belongsTo(Orden::class);
    }
}
