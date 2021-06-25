<?php

namespace App\Http\Livewire;

use Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $descuento;
    public $subtotal_;
    public $iva;
    public $total_;
    
    public function aumentar($rowId){
        $producto = Cart::instance('cart')->get($rowId);
        $qty = $producto->qty+1;
        Cart::instance('cart')->update($rowId, $qty);
    }
    
    public function disminuir($rowId){
        $producto = Cart::instance('cart')->get($rowId);
        $qty = $producto->qty-1;
        Cart::instance('cart')->update($rowId, $qty);
    }

    public function borrar($rowId){
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message', ' El artículo se ha eliminado del carrito');
    }

    public function borrarTodo(){
        Cart::instance('cart')->destroy();
    }
    public function descuento(){
        $this->subtotal_=Cart::instance('cart')->subtotal() - $this->descuento;
        $this->iva=($this->subtotal_*config('cart.tax'))/100;
        $this->total_=$this->subtotal_+$this->iva;
    }

    public function checkout(){
        if(Auth::check()){
            return redirect()->route('checkout');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function cuenta(){
        if (!Cart::instance('cart')->count() > 0){
            session()->forget('checkout');
            return;
        }
        session()->put('checkout',[
            'descuento'=>0,
            'subtotal'=>Cart::instance('cart')->subtotal(),
            'tax'=>Cart::instance('cart')->tax(),
            'total'=>Cart::instance('cart')->total()
        ]);
    }

    public function render()
    {
        $this->cuenta();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
