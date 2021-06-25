<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Str;

class AdminAgregarCategoria extends Component
{
    public $nombre;
    public $slug;

    public function copiarNombre(){
        $this->slug = Str::slug($this->nombre);
    }

    public function updated($fields){
        $this->validateOnly($fields, [
            'nombre'=>'required',
            'slug'=>'required|unique:categorias'
        ]);
    }
    public function almacenar(){
        $this->validate([
            'nombre'=>'required',
            'slug'=>'required|unique:categorias'
        ]);
        $categoria = new Categoria();
        $categoria->nombre = $this->nombre;
        $categoria->slug = $this->slug;
        $categoria->save();
        session()->flash('mensaje', 'La categoría ha sido creada');
    }

    public function render()
    {
        return view('livewire.admin.admin-agregar-categoria')->layout('layouts.base');
    }
}
