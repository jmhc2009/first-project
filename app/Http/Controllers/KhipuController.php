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
         /*Se obtien el total del carro y elnúmero de pedido*/
	     if(Cart::getContent()->count()>0):
             $total = Cart::getSubTotal();
             $order=Order::all()->last();
             $oc=$order->cod;
             $return_url = view('khipu.exito');
             $cancel_url = view('khipu.cancel');
		else:
            //Redirige a comprar
            return redirect()->route('welcome');
        endif;

  $Khipu = new Khipu();
  $khipu_service = Khipu::loadService('CreatePaymentPage');
  $data = array(
    'subject' => 'Pago de prueba',
    'body' => 'Descripción del producto',
    'amount' => $total,
    // Página de exito
    'return_url' => $return_url,
    // Página de fracaso
    'cancel_url' => $cancel_url,
    'transaction_id' => $oc,
    // Dejar por defecto un correo para recibir el comprobante
    'payer_email' => 'juan@socoprose.cl',
    // url de la imagen del producto o servicio
    /*'picture_url' => $picture_url,*/
    // Opcional
    'custom' => 'Custom Variable',
    // definimos una url en donde se notificará del pago
    /*'notify_url' => $notify_url,*/
  );
  // Recorremos los datos y se lo asignamos al servicio.
  foreach ($data as $name => $value) {
    $khipu_service->setParameter($name, $value);
  }
   /*dd($khipu_service);*/

  // Luego imprimimos el formulario html
      dd($khipu_service->renderForm());



        /* dd(Khipu::loadService('CreateEmail')->consult());*/
    }
}
