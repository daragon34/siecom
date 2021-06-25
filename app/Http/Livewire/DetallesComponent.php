<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Cart;

class DetallesComponent extends Component
{   
    public  $slug;
    
    public function mount($slug){
        $this->slug=($slug);
    }
    
    public function store($productos_id, $productos_nombre, $productos_preciocompra){
        Cart::add($productos_id, $productos_nombre, 1, $productos_preciocompra)->associate('App\Models\Producto');
        session()->flash('success_message', 'Producto añadido al carrito');
        return redirect()->route('producto.cart');
    }

    public function render()
    {
        $producto = Producto::where('slug', $this->slug)->first();
        $productos_populares = Producto::inRandomOrder()->limit(6)->get();
        $productos_relacionados = Producto::where('categoria_id', $producto->categoria_id)->inRandomOrder()->limit(6)->get();
        return view('livewire.detalles-component', ['producto'=>$producto, 'productos_populares'=>$productos_populares,'productos_relacionados'=>$productos_relacionados])->layout('layouts.base');
    }
}
