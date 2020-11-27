<?php

namespace App\Http\Controllers;

use App\Order;
use Freshwork\Transbank\RedirectorHelper;
use Freshwork\Transbank\WebpayPatPass;
use Illuminate\Http\Request;
use Freshwork\Transbank\WebpayNormal;

class CheckoutController extends Controller
{
    public function initTransaction(WebpayNormal $webpayNormal)
	{
        $order=Order::first();
		$webpayNormal->addTransactionDetail($order->total, 'order-' . $order->id);
		$response = $webpayNormal->initTransaction(route('checkout.webpay.response'), route('checkout.webpay.finish'));
		// Probablemente también quieras crear una orden o transacción en tu base de datos y guardar el token ahí.

		return RedirectorHelper::redirectHTML($response->url, $response->token);
	}

	public function response(WebpayPatPass $webpayPatPass)
	{
	  $result = $webpayPatPass->getTransactionResult();
	  $order=Order::first();
	  session(['response' => $result]);
	  // Revisar si la transacción fue exitosa ($result->detailOutput->responseCode === 0) o fallida para guardar ese resultado en tu base de datos.

        if($result->detailOutput->responseCode === 0):
            $order->status = 'pendiente';
        else:
            $order->status = 'pagado';
		endif;
		$order->save();

        return RedirectorHelper::redirectBackNormal($result->urlRedirection);
	}

	public function finish()
	{
	    //dd($_POST,session('response'));
	    // Acá buscar la transacción en tu base de datos y ver si fue exitosa o fallida, para mostrar el mensaje de gracias o de error según corresponda
        $order=Order::first();
        return view('webpay.finish',compact('order'));
	}
}
