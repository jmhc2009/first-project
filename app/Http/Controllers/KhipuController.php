<?php

namespace App\Http\Controllers;

use BlenderDeluxe\LaravelKhipu\Facades\Khipu;
use Illuminate\Support\Facades\Auth;
use App\Order;
use Cart;

class KhipuController extends Controller
{ //Método que inicia la transaccion en Khipu
    public function payments()
    {
        //Se obtiene el total del carro y el número de pedido
        if (Cart::getContent()->count() > 0):
            $total = Cart::getSubTotal();
            $order = Order::all()->last();
            $oc = $order->cod;
            $return_url = 'https://www.cafperfumes.cl/payments-finish';
            $cancel_url = 'https://www.cafperfumes.cl/payments-cancel';
            $notify_url = 'https://www.cafperfumes.cl/payments-finish';

        else:
            //Redirige a comprar
             return redirect()->route('welcome');
        endif;

        $receiverId = 361023;
        $secretKey = '0d72d27e73accf18a16ff148a03952a8ec47503b';


        $khipu = new Khipu();
        khipu::authenticate($receiverId, $secretKey);
        $khipu_service = Khipu::loadService('CreatePaymentPage');
        $data = array(
            'subject' => 'Pago CAFperfumes',
            'body' => 'Descripción del producto',
            'amount' => $total,
            // Página de exito
            'return_url' => $return_url,
            // Página de fracaso
            'cancel_url' => $cancel_url,
            'transaction_id' => $oc,
            // Dejar por defecto un correo para recibir el comprobante
            'payer_email' => Auth::user()->email,
            // url de la imagen del producto o servicio
            //'picture_url' => $picture_url,
            // Opcional
            'custom' => 'Custom Variable',
            // definimos una url en donde se notificará del pago
            'notify_url' => $notify_url,
        );
        // Recorremos los datos y se lo asignamos al servicio.
        // foreach ($data as $name => $value) {
        //     $khipu_service->setParameter($name, $value);
        // dd($data);
        return view('khipu.checkout', compact('data', 'khipu_service','order'));

        }






        // Luego imprimimos el formulario html
        // return ($khipu_service->renderForm());

        /*return view('khipu.checkout', compact('order'));*/

        //dd(Khipu::loadService('CreateEmail')->consult());


    public function cancel()
    {
        //Muestra las vistas éxito/fracaso
        return view('khipu.cancel');
    }

    public function finish()
    {
        //Muestra las vistas éxito/fracaso
        return view('khipu.finish');
    }

}
