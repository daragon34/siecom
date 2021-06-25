<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class HomeComponent extends Component
{
    public function render()
    {
        $u_productos = Producto::orderBy('created_at', 'DESC')->get()->take(10);
        return view('livewire.home-component', ['u_productos'=>$u_productos])->layout('layouts.base');
    }
}
