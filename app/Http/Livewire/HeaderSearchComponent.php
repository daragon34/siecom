<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class HeaderSearchComponent extends Component
{
    public $search;
    public $producto_cat;
    public $producto_cat_id;

    public function mount(){
        $this->producto_cat = "Todas las categorías";
        $this->fill(request()->only('search','producto_cat','producto_cat_id'));
    }

    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.header-search-component', ['categorias'=>$categorias]);
    }
}
