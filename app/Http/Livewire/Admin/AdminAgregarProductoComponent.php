<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class AdminAgregarProductoComponent extends Component
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

    public function mount(){
        $this->disponibilidad = 'disponible';
        $this->destacar = 0;
    }
    
    public function copiarNombre(){
        $this->slug = Str::slug($this->nombre);
    }
    public function updated($fields){
        $this->validateOnly($fields, [
            'nombre'=> 'required',
            'slug'=> 'required|unique:productos',
            'descripcion_corta'=> 'required',
            'descripcion'=> 'required',
            'precio_regular'=> 'required|numeric',
            'precio_compra'=> 'required|numeric',
            'disponibilidad'=> 'required',
            'destacar'=> 'required',
            'sku'=> 'required',
            'cantidad'=> 'required',
            'imagen'=> 'required|mimes:jpeg, jpg, png, webp, tiff, gif',
            'categoria_id'=> 'required',
        ]);
    }
    public function agregarProducto(){
        $this->validate([
            'nombre'=> 'required',
            'slug'=> 'required|unique:productos',
            'descripcion_corta'=> 'required',
            'descripcion'=> 'required',
            'precio_regular'=> 'required|numeric',
            'precio_compra'=> 'required|numeric',
            'disponibilidad'=> 'required',
            'destacar'=> 'required',
            'sku'=> 'required',
            'cantidad'=> 'required',
            'imagen'=> 'required|mimes:jpeg, jpg, png, webp, tiff, gif',
            'categoria_id'=> 'required',
        ]);
        $producto = new Producto();
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
        $nueva_imagen = Carbon::now()->timestamp. '.' . $this->imagen->extension();
        $this->imagen->storeAs('products',$nueva_imagen);
        $producto->imagen = $nueva_imagen;
        $producto->categoria_id = $this->categoria_id;
        $producto->save();
        session()->flash('mensaje', 'El producto ha sido creado');
    }
    
    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.admin.admin-agregar-producto-component', ['categorias'=>$categorias])->layout('layouts.base');
    }
}