<?php

namespace App\Http\Livewire\Admin;

use App\Models\Orden;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminOrdenComponent extends Component
{
    public function actualizarEstado($orden_id, $estado){
        $orden = Orden::find($orden_id);
        $orden->estado=$estado;
        if ($estado=="enviado"){
            $orden->fecha_envio=DB::raw('CURRENT_DATE');
        }
        else if ($estado=="cancelado"){
            $orden->fecha_cancel=DB::raw('CURRENT_DATE');
        }
        $orden->save();
        session()->flash('mensaje', 'La orden ha sido actualizada');

    }
    public function render()
    {
        $ordenes = Orden::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-orden-component', ['ordenes'=>$ordenes])->layout('layouts.base');
    }
}
