<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;
use Cart;

class CategoriaComponent extends Component
{
    public $clasificar;
    public $paginar;
    public $categoria_slug;

    public function mount($categoria_slug){
        $this->clasificar = "default";
        $this->paginar = 10;
        $this->categoria_slug = $categoria_slug;
    }


    public function store($productos_id, $productos_nombre, $productos_preciocompra){
        Cart::add($productos_id, $productos_nombre, 1, $productos_preciocompra)->associate('App\Models\Producto');
        session()->flash('success_message', ' Producto añadido al carrito');
        return redirect()->route('producto.cart');
    }
    
    use WithPagination;
    public function render()

    {
        $categoria = Categoria::where('slug', $this->categoria_slug)->first();
        $categoria_id = $categoria->id;
        $categoria_nombre = $categoria->nombre;
        if ($this->clasificar=='date'){
            $productos = Producto::where('categoria_id',$categoria_id)->orderBy('created_at', 'DESC')->paginate($this->paginar);
        }

        else if($this->clasificar=='price'){
            $productos = Producto::where('categoria_id',$categoria_id)->orderBy('precio_compra', 'ASC')->paginate($this->paginar);
        }

        else if($this->clasificar=='price-desc'){
            $productos = Producto::where('categoria_id',$categoria_id)->orderBy('precio_compra', 'DESC')->paginate($this->paginar);
        }
        else{
            $productos = Producto::where('categoria_id',$categoria_id)->paginate($this->paginar);
        }
        
        $categorias = Categoria::all();
        return view('livewire.categoria-component',['productos'=>$productos, 'categorias'=>$categorias, 'categoria_nombre'=>$categoria_nombre])->layout('layouts.base');
    }
}
