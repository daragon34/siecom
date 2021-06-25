<?php

namespace App\Http\Livewire\User;

use App\Models\Orden;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserOrdenDetalleComponent extends Component
{
    public $orden_id;
    
    public function mount($orden_id){
        $this->orden_id = $orden_id;
    }

    public function cancelarOrden(){
        $orden=Orden::find($this->orden_id);
        $orden->estado="cancelado";
        $orden->fecha_cancel=DB::raw("CURRENT_DATE");
        $orden->save();
        session()->flash('mensaje','La orden ha sido cancelada');
    }

    public function render()
    {
        $orden = Orden::where('usuario_id', Auth::user()->id)->where('id', $this->orden_id)->first();
        return view('livewire.user.user-orden-detalle-component', ['orden'=>$orden])->layout('layouts.base');
    }
}
