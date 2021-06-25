<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class AdminEditarProductoComponent extends Component
{
    use WithFileUploads;
    public $nombre;
    public $slug;
    public $descripcion_corta;
    public $descripcion;
    public $precio_regular;
    public $precio_compra;
    public $disponibilidad;
    public $destacar;
    public $sku;
    public $cantidad;
    public $imagen;
    public $categoria_id;
    public $nueva_imagen;
    public $producto_id;

    public function mount($producto_slug){
        $producto = Producto::where('slug', $producto_slug)->first();
        $this->nombre = $producto->nombre; 
        $this->slug = $producto->slug; 
        $this->descripcion_corta = $producto->descripcion_corta; 
        $this->descripcion = $producto->descripcion; 
        $this->precio_regular = $producto->precio_regular; 
        $this->precio_compra = $producto->precio_compra; 
        $this->disponibilidad = $producto->disponibilidad; 
        $this->destacar = $producto->destacar; 
        $this->sku = $producto->sku; 
        $this->cantidad = $producto->cantidad; 
        $this->imagen = $producto->imagen; 
        $this->categoria_id = $producto->categoria_id; 
        $this->producto_id = $producto->id; 

    }
    
    public function copiarNombre(){
        $this->slug = Str::slug($this->nombre,'-');
    }

    public function actualizarProducto(){
        $producto = Producto::find($this->producto_id);
        $producto->nombre = $this->nombre;
        $producto->slug = $this->slug;
        $producto->descripcion_corta = $this->descripcion_corta;
        $producto->descripcion = $this->descripcion;
        $producto->precio_regular = $this->precio_regular;
        $producto->precio_compra = $this->precio_compra;
        $producto->disponibilidad = $this->disponibilidad;
        $producto->destacar = $this->destacar;
        $producto->sku = $this->sku;
        $producto->cantidad = $this->cantidad;
        if ($this->nueva_imagen){
            $imagen_n = Carbon::now()->timestamp. '.' . $this->nueva_imagen->extension();
            $this->nueva_imagen->storeAs('products',$imagen_n);
            $producto->imagen = $imagen_n;
        }
        $producto->categoria_id = $this->categoria_id;
        $producto->save();
        session()->flash('mensaje', 'El producto ha sido actualizado');
    }
    
    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.admin.admin-editar-producto-component', ['categorias'=>$categorias])->layout('layouts.base');
    }
}