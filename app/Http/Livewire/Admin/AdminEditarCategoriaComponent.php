<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Str;

class AdminEditarCategoriaComponent extends Component
{
    public $categoria_id;
    public $categoria_slug;
    public $nombre;
    public $slug;

    public function mount($categoria_slug){
        $this->categoria_slug = $categoria_slug;
        $categoria = Categoria::where('slug',$categoria_slug)->first();
        $this->categoria_id = $categoria->id;
        $this->nombre = $categoria->nombre;
        $this->slug = $categoria->slug;
    }

    public function copiarNombre(){
        $this->slug = Str::slug($this->nombre, '-');
    }
    
    public function actualizar(){
        $categoria = Categoria::find($this->categoria_id);
        $categoria->nombre = $this->nombre;
        $categoria->slug = $this->slug;
        $categoria->save();
        session()->flash('mensaje', 'La categoría ha sido actualizada');
    }
    public function render()
    {
        return view('livewire.admin.admin-editar-categoria-component')->layout('layouts.base');
    }
}
