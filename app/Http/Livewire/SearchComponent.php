<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;
use Cart;

class SearchComponent extends Component
{
    public $clasificar;
    public $paginar;
    public $search;
    public $producto_cat;
    public $producto_cat_id;

    public function mount(){
        $this->clasificar = "default";
        $this->paginar = 10;
        $this->fill(request()->only('search','producto_cat','producto_cat_id'));
    }


    public function store($productos_id, $productos_nombre, $productos_preciocompra){
        Cart::add($productos_id, $productos_nombre, 1, $productos_preciocompra)->associate('App\Models\Producto');
        session()->flash('success_message', 'Producto añadido al carrito');
        return redirect()->route('producto.cart');
    }
    
    use WithPagination;
    public function render()

    {
        if ($this->clasificar=='date'){
            $productos = Producto::where('nombre','LIKE', '%'.$this->search .'%')->where('categoria_id', 'LIKE', '%'.$this->producto_cat_id.'%')->orderBy('created_at', 'DESC')->paginate($this->paginar);
        }
        else if($this->clasificar=='price'){
            $productos = Producto::where('nombre','LIKE', '%'.$this->search .'%')->where('categoria_id', 'LIKE', '%'.$this->producto_cat_id.'%')->orderBy('precio_compra', 'ASC')->paginate($this->paginar);
        }
        else if($this->clasificar=='price-desc'){
            $productos = Producto::where('nombre','LIKE', '%'.$this->search .'%')->where('categoria_id','LIKE', '%'.$this->producto_cat_id.'%')->orderBy('precio_compra', 'DESC')->paginate($this->paginar);
        }
        else{
            $productos = Producto::where('nombre','LIKE', '%'.$this->search .'%')->where('categoria_id', 'LIKE', '%'.$this->producto_cat_id.'%')->paginate($this->paginar);
        }
        $categorias = Categoria::all();
        return view('livewire.search-component',['productos'=>$productos, 'categorias'=>$categorias])->layout('layouts.base');
    }
}
