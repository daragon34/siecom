<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;

class AdminCategoriaComponent extends Component
{
    use WithPagination;

    public function borrar($id){
        $categoria = Categoria::find($id);
        $categoria->delete();
        session()->flash('mensaje', 'La categoría ha sido eliminada');

    }

    public function render()
    {
        $categorias = Categoria::paginate(10);
        return view('livewire.admin.admin-categoria-component', ['categorias'=>$categorias])->layout('layouts.base');
    }
}
