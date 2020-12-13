<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Product;
use Cart;
use Auth;




class CartController extends Controller
{    
    public function cart()
    //Muestra el carrito
    {
        
        return view('cart.checkout');
    }
    
    public function add(Request $request)
    //Método add agrega un elemento al carro
    {
       $product = Product::find($request->id);

       Cart::add(
            $product->id,           
            $product->name, 
            $product->price,
            1,
            array('image'=>$product->image)
                       
        );
        return back()->with('status',"$product->name ¡se ha agregado al carrito!");
    }   

    public function remouveitem(Request $request)
    //Método remover un item del carro
    {
        Product::find($request->id);

        Cart::remove([
            'id'=> $request->id]);

        return back()->with('status',"Producto eliminado del carrito!");
    }
    
    public function clear()
    //Método para vaciar el carrito
    {
        Cart::clear();

        return back()->with('status',"¡Carrito vacío!");
    }

    
}
