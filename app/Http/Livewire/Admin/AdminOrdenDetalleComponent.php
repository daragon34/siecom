<?php

namespace App\Http\Livewire\Admin;

use App\Models\Orden;
use Livewire\Component;

class AdminOrdenDetalleComponent extends Component
{
    public $orden_id;

    public function mount($orden_id){
        $this->$orden_id = $orden_id;
    }
    
    public function render()
    {
        $orden = Orden::find($this->orden_id);
        return view('livewire.admin.admin-orden-detalle-component',['orden'=>$orden])->layout('layouts.base');
    }
}
