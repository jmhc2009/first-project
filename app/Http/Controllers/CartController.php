<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
//use Darryldecode\Cart\Cart;
use Cart;



class CartController extends Controller
{
//Método muestra el carrito
    public function cart()
    {
        return view('cart.checkout',[
            'products'=>Product::orderBy('id','desc')->get()
        ]);
    }
//Método add agrega un elemento al carro
    public function add(Request $request)
    {
       $product = Product::find($request->id);

       Cart::add(
            $product->id,
            $product->name,
            $product->price,
            1,
            array('image'=>$product->image)

        );

            /*toastr()->success("$product->name ¡se ha agregado al carrito!");*/
        return redirect('/')->with("status","¡$product->name ¡se ha agregado al carrito!");
    }

//Método remover un item del carro
    public function remouveitem(Request $request)
    {
        Product::find($request->id);
        Cart::remove([
            'id'=> $request->id]);

        return back()->with('status',"¡Producto eliminado del carrito!");
    }

//Método aumentar un item del carro
    public function upitem(Request $request)
    {
       $product = Product::find($request->id);
       Cart::update($product->id,
            array('quantity'=>1)
        );
        return back()->with('status',"¡Carrito actualizado!");
    }

    //Método disminuir un item del carro
    public function downitem(Request $request)
    {
       $product = Product::find($request->id);
       Cart::update($product->id,
            array('quantity'=>-1)
        );
       return back()->with('status',"¡Carrito actualizado!");
    }

//Método para vaciar el carrito
    public function clear()
    {
        Cart::clear();

        return back()->with('status',"¡Carrito vacío!");
    }


}
