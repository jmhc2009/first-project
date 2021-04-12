<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index',[
            'orders'=>Order::orderBy('id','desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $respuesta = Http::get('https://apis.digital.gob.cl/dpa/regiones');
        $regiones = $respuesta->json();

        $respuesta = Http::get('https://apis.digital.gob.cl/dpa/comunas');
        $comunas = $respuesta->json();

        return view('orders.create',compact( 'regiones','comunas'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación campos principales del formulario
        request()->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
            'region'=>'required',
            'city'=>'required',
           
        ]);

         //si existen productos en el carro, procesar pedido
        if(Cart::getContent()->count()>0):
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->receiver_name = request('name');
            $order->receiver_surname = request('surname');
            $order->phone = request('phone');
            $order->address = request('address');
            $order->region = request('region');
            $order->city = request('city');
            $order->villa = request('villa');
            $order->message = request('message');
            $order->paymentMethod = request('paymentMethod');
            $order->subTotal = Cart::getSubTotal()/1.19;
            $order->impuesto = Cart::getSubTotal()*0.19;
            $order->total = Cart::getSubTotal();
            $order->status = 0;
            $order->cod = time();

            //Guarda el pedido
            $order->save();

            //Guarda el pedido en la tabla pivote order_product
            foreach(Cart::getContent() as $item):
                $product_id = $item->id;
                $units = $item->quantity;

                $order->products()->attach([
                    $product_id => [
                        'units'=>$units
                        ]
                    ]);
            endforeach;

            //Selecciona metodo de pago webpay/khipu

             //Redirige a pagar con webpay
            if(request('paymentMethod') == 'debito-credito'):           
            return view('webpay.checkout', compact('order'));

            //Redirige a pagar con Khipu
            elseif (request('paymentMethod') == 'transferencia'):                
            return view('khipu.checkout', compact('order'));

            endif;
        endif;

        //Redirige a la tienda a comprar
        return redirect()->route('welcome');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Muestra el detalle del pedido
    public function show($id)
    {
        $orders = Order::findOrFail($id);
        $users = User::all();
        $products = Product::all();
            return view('orders.show',[
                'order'=>$orders,
                'user'=>$users,
                'product'=>$products,[
                    'units']
            ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);

        return redirect()->route('welcome');
    }


}
