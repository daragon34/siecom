<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    public $clasificar;
    public $paginar;

    public function mount(){
        $this->clasificar = "default";
        $this->paginar = 10;
    }


    public function store($productos_id, $productos_nombre, $productos_preciocompra){
        Cart::instance('cart')->add($productos_id, $productos_nombre, 1, $productos_preciocompra)->associate('App\Models\Producto');
        session()->flash('success_message', 'Producto añadido al carrito');
        return redirect()->route('producto.cart');
    }
    
    use WithPagination;
    public function render()

    {
        if ($this->clasificar=='date'){
            $productos = Producto::orderBy('created_at', 'DESC')->paginate($this->paginar);
        }

        else if($this->clasificar=='price'){
            $productos = Producto::orderBy('precio_compra', 'ASC')->paginate($this->paginar);
        }

        else if($this->clasificar=='price-desc'){
            $productos = Producto::orderBy('precio_compra', 'DESC')->paginate($this->paginar);
        }
        else{
            $productos = Producto::paginate($this->paginar);
        }
        
        $categorias = Categoria::all();
        return view('livewire.shop-component',['productos'=>$productos, 'categorias'=>$categorias])->layout('layouts.base');
    }
}
