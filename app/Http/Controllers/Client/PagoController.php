<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Campeonato;
use Illuminate\Http\Request;



use Illuminate\Support\Facades\DB;

use App\Models\Pago;

use App\Models\User;
use App\Models\Video;
use App\Notifications\PagoNotification;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;






class PagoController extends Controller
{
    private $apiContext;

    private $client;
    private $clientId;
    private $secret;


    public function __construct()
    {


        $paypalConfig = Config::get('paypal');
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypalConfig['client_id'],
                $paypalConfig['secret']
            )
        );


        $this->client = new Client([
            'base_uri' => 'https://api-m.sandbox.paypal.com'
        ]);

        $this->clientId = env('PAYPAL_CLIENT_ID');
        $this->secret = env('PAYPAL_SECRET');
    }

    /*MODELO* DE SUSCRIPCION PLAN PRIMIUM- COMPRA DE UN CAMPEONATO*/


    public function pagoCampeonato(Request $request, $idCampeonato)
    {



        $cliente = User::findOrFail(auth()->user()->id);
        $campeonato = Campeonato::findOrFail($idCampeonato);
        $idCampeonato = $campeonato->idCampeonato;
        $campenatoVideos =  $campeonato->Videos()->get();
        $campenatoComprar = Campeonato::where('idCampeonato', $idCampeonato)->get();
        $suscripciones = $cliente->Videos;
        $videoSuscripcion = array();

        foreach ($suscripciones as $suscripcion) {
            //obteniendo datos de la tabla pivot suscripcion
            array_push($videoSuscripcion, $suscripcion->pivot->idVideo);
        }
        $videoNoSuscripcion = array();
        $i = 0;
        foreach ($campenatoVideos as $video) {
            //obteniendo datos de la tabla pivot suscripcion
            if (in_array($video->idVideo, $videoSuscripcion)) {
            } else {
                $videoNoSuscripcion[$i] = $video;
                $i++;
            }
        }

        /*cuando se haya determinado los videos del campeonato que no posee subs, se anlaizara el descuento */

        foreach ($campenatoComprar as $campenato) {
            $nombreCampeonato = $campenato->NombreCam;
            $descuentoCampeonato = $campenato->DescuentoCam;
        }

        $videosCampeonato = Video::where('idCampeonato', $idCampeonato)->get();
        $aux1 = count($videosCampeonato); // numero de videos del campeonato
        $aux2 = count($videoNoSuscripcion); //  numero de videos suscritos 

        // cáclulo del subtotal del campeanato 
        $subtotal = 0;

        foreach ($videoNoSuscripcion as $video) {
            $subtotal =  $subtotal +  $video->PrecioVid;
        }

        $descuento = 0;
        if ($aux1 == $aux2) {   // si los videos del campeonato es igual a los videos de no suscripcion se aplica el desucuento  


            $descuento = ($descuentoCampeonato *  $subtotal) / 100;

            $monto =  $subtotal - $descuento;
            // cáclulo del descueto del campeanto
        } else {
            $monto = $subtotal;
        }



        // $monto = $videoPagar->PrecioVid;

        $idCliente = auth()->user()->id;

        $nombre = auth()->user()->name;
        $correo = auth()->user()->email;

        $direccion = "";
        $contacto = "";

        $transaccion['idCliente'] = $idCliente;
        $transaccion['nombreCliente'] = $nombre;
        $transaccion['correoCliente'] = $correo;

        $transaccion['direccionCliente'] = $direccion;
        $transaccion['contactoCliente'] = $contacto;
        $transaccion['campeonatoCliente'] = $idCampeonato;

        $transaccion['monto'] = $monto;

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $amount = new Amount();
        $amount->setTotal($monto);
        $amount->setCurrency('USD');
        $transaction = new Transaction();
        $transaction->setAmount($amount);
        // $transaction->setDescription('See your IQ results');

        $callbackUrl = url('/streaming/status/pago/campeonato/' . urlencode(json_encode($transaccion)));

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function statusCampeonato(Request $request, $transaccion)
    {

        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/streaming/pago/paypal/fallo')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);


        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {


            $datenow = new DateTime();



            $transaccion = json_decode(urldecode($transaccion));

            $campenatoPagar = Campeonato::find($transaccion->campeonatoCliente);


            // recupera pack de videos 
            $packVideos = Video::where('idCampeonato', $transaccion->campeonatoCliente)->get();

            // Pagos- suscripciones y mestro detalle para cada video del pack


            
        $cliente = User::findOrFail(auth()->user()->id);
        $billing = $cliente->billing;


           $pago= Pago::create([
                'TipoPago' =>   2,
                'idCliente' => $transaccion->idCliente,
                'NombreCompleto' => $billing->name,
                'idPaypal' => $result->getId(),
                'Email' =>   $billing->email,

                'Direccion' =>  $billing->direccion,
                'Telefono' => $billing->telefono,

                'FechaHoraPago' => $datenow,
                'TotalPago' => $transaccion->monto


            ]);
               

       
           

            $suscripciones = DB::table('suscripciones')
                ->where('idCliente', auth()->user()->id)
                ->get();

            $videoSuscripcion = array();

            foreach ($suscripciones as $suscripcion) {
                //obteniendo datos de la tabla  suscripcion
                array_push($videoSuscripcion, $suscripcion->idVideo);
            }




            foreach ($packVideos  as $video) {


                if (in_array($video->idVideo, $videoSuscripcion)) {
                } else {

                    $video->Suscripciones()->attach($transaccion->idCliente, [
                        'TipoSus' => 1,
                        'CreacionSus' => $datenow
                    ]);


                    $ultimoPago = Pago::where('idCliente', auth()->user()->id)->latest()->first();

                    $video->DetallesPago()->attach($ultimoPago->idPago, [
                        'PrecioPago' => $transaccion->monto,
                        'CreacionDetPag' => $datenow,
                        'ModificacionDetPag' => $datenow,

                    ]);
                }
            }

            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
            
            $usuario = User::find( auth()->user()->id);
            $usuario->notify(new PagoNotification($pago));

            return redirect()->route('cliente.campeonato.show', $campenatoPagar->idCampeonato)->with(compact('status'));
           
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/streaming/pago/paypal/fallo')->with(compact('status'));
    }


    public function pagoCampeonatoCompleto()
    {
        return view('client.estado.index',);
    }

    private function getAccessToken()
    {
        $response = $this->client->request(
            'POST',
            '/v1/oauth2/token',
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'body' => 'grant_type=client_credentials',
                'auth' => [
                    $this->clientId, $this->secret, 'basic'
                ]
            ]
        );

        $data = json_decode($response->getBody(), true);
        return $data['access_token'];
    }
    public function tarjetaCampeonato($orderId, Request $request)
    {


        $accessToken = $this->getAccessToken();

        $requestUrl = "/v2/checkout/orders/$orderId/capture";

        $response = $this->client->request('POST', $requestUrl, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer $accessToken"
            ]
        ]);

        $data = json_decode($response->getBody(), true);



        if ($data['status'] === 'COMPLETED') {


            $cliente = User::findOrFail(auth()->user()->id);
            $billing = $cliente->billing;

            

            $amount = $data['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $nombre = $billing->name;

            $email = $billing->email;
            $direccion = $billing->direccion;
            $telefono = $billing->telefono;

            $idPaypal = $data['purchase_units'][0]['payments']['captures'][0]['id'];


            $datenow = new DateTime();
            $idCampeonato = $request->input('idCampeonato');
            $datenow = new DateTime();

            $idCliente = auth()->user()->id;
            $campenatoPagar = Campeonato::find($idCampeonato);
            // recupera pack de videos 
            $packVideos = Video::where('idCampeonato', $idCampeonato)->get();

            // Pagos- suscripciones y mestro detalle para cada video del pack



           $pago= Pago::create([
                'TipoPago' =>   2,
                'idCliente' => auth()->user()->id,
                'NombreCompleto' => $nombre,
                'Email' =>  $email,
                'idPaypal' => $idPaypal,
                'Direccion' => $direccion,
                'Telefono' => $telefono ,
                'FechaHoraPago' => $datenow,
                'TotalPago' =>  $amount,



            ]);
           
            $usuario = User::find( auth()->user()->id);
            $usuario->notify(new PagoNotification($pago));
            

            $suscripciones = DB::table('suscripciones')
                ->where('idCliente', auth()->user()->id)
                ->get();

            $videoSuscripcion = array();

            foreach ($suscripciones as $suscripcion) {
                //obteniendo datos de la tabla  suscripcion
                array_push($videoSuscripcion, $suscripcion->idVideo);
            }




            foreach ($packVideos  as $video) {


                if (in_array($video->idVideo, $videoSuscripcion)) {
                } else {



                    $video->Suscripciones()->attach(auth()->user()->id, [
                        'TipoSus' => 1,
                        'CreacionSus' => $datenow
                    ]);


                    $ultimoPago = Pago::where('idCliente', auth()->user()->id)->latest()->first();

                    $video->DetallesPago()->attach($ultimoPago->idPago, [
                        'PrecioPago' => $amount,
                        'CreacionDetPag' => $datenow,
                        'ModificacionDetPag' => $datenow,

                    ]);
                }
            }

            // Dar una respuesta de éxito si todo salió bien
            return [
                'success' => true,
                'url' => '/streaming/suscripcion/eventos/campeonato/' . $campenatoPagar->idCampeonato,

            ];
        }
    }


    /*MODELO* DE SUSCRIPCION PLAN STAR  COMPRA DE UN VIDEO*/




    public function pagoVideo(Request $request, $idVideo)
    {

        /* datos cliente  para una transacción*/

        $videoPagar = Video::findOrFail($idVideo);
        $monto = $videoPagar->PrecioVid;

        $idCliente = auth()->user()->id;
        $nombre = auth()->user()->name;
        $correo = auth()->user()->email;
        $direccion = '';
        $contacto =  '';

        $transaccion['idCliente'] = $idCliente;
        $transaccion['nombreCliente'] = $nombre;
        $transaccion['correoCliente'] = $correo;

        $transaccion['direccionCliente'] = $direccion;
        $transaccion['contactoCliente'] = $contacto;
        $transaccion['videoCliente'] = $idVideo;

        $transaccion['monto'] = $monto;

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $amount = new Amount();
        $amount->setTotal($monto);
        $amount->setCurrency('USD');
        $transaction = new Transaction();
        $transaction->setAmount($amount);
        // $transaction->setDescription('See your IQ results');

        $callbackUrl = url('/streaming/status/pago/video/' . urlencode(json_encode($transaccion)));

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function statusVideo(Request $request, $transaccion)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/streaming/pago/paypal/fallo')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        $tipo = "2";
        if ($result->getState() === 'approved') {
            $datenow = new DateTime();

            $transaccion = json_decode(urldecode($transaccion));

            $video = Video::find($transaccion->videoCliente);

            $cliente = User::findOrFail(auth()->user()->id);
            $billing = $cliente->billing;



           $pago= Pago::create([
                'TipoPago' =>   1,
                'idCliente' => $transaccion->idCliente,
                'NombreCompleto' => $billing->name ,
                'idPaypal' => $result->getId(),
                'Email' =>   $billing->email,

                'Direccion' =>   $billing->direccion,
                'Telefono' => $billing->telefono,
                'FechaHoraPago' => $datenow,
                'TotalPago' => $transaccion->monto
            ]);
           
            $usuario = User::find( auth()->user()->id);
            $usuario->notify(new PagoNotification($pago));
            
            $suscripciones = DB::table('suscripciones')
                ->where('idCliente', auth()->user()->id)
                ->get();

            $videoSuscripcion = array();

            foreach ($suscripciones as $suscripcion) {
                //obteniendo datos de la tabla  suscripcion
                array_push($videoSuscripcion, $suscripcion->idVideo);
            }


            if (in_array($video->idVideo, $videoSuscripcion)) {
            } else {




                $ultimoPago = Pago::where('idCliente', auth()->user()->id)->latest()->first();

                $video->DetallesPago()->attach($ultimoPago->idPago, [
                    'PrecioPago' => $transaccion->monto,
                    'CreacionDetPag' => $datenow,
                    'ModificacionDetPag' => $datenow,

                ]);

                $video->Suscripciones()->attach($transaccion->idCliente, [
                    'TipoSus' => 1,
                    'CreacionSus' => $datenow
                ]);
            }


            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';

            return redirect()->route('cliente.suscripcion.video', $video->idVideo)->with(compact('status'));
        }


        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/streaming/pago/paypal/fallo')->with(compact('status'));
    }


    public function pagoVideoCompleto()
    {
        return view('client.estado.index',);
    }





    public function tarjetaVideo($orderId, Request $request)
    {

        $accessToken = $this->getAccessToken();

        $requestUrl = "/v2/checkout/orders/$orderId/capture";

        $response = $this->client->request('POST', $requestUrl, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer $accessToken"
            ]
        ]);

        $data = json_decode($response->getBody(), true);



        if ($data['status'] === 'COMPLETED') {


            $cliente = User::findOrFail(auth()->user()->id);
            $billing = $cliente->billing;




            $amount = $data['purchase_units'][0]['payments']['captures'][0]['amount']['value'];

            $nombre = $billing->name;

            $email = $billing->email;

            $direccion = $billing->email;
            $telefono = $billing->telefono;

            $idPaypal = $data['purchase_units'][0]['payments']['captures'][0]['id'];


            $datenow = new DateTime();
            $idVideo = $request->input('idVideo');
            $video =   Video::findOrFail($idVideo);

           $pago= Pago::create([
                'TipoPago' =>   1,
                'idCliente' => auth()->user()->id,
                'NombreCompleto' => $nombre,
                'Email' =>  $email,
                'idPaypal' => $idPaypal,
                'Direccion' => $direccion,
                'Telefono' => $telefono,

                'FechaHoraPago' => $datenow,
                'TotalPago' =>  $amount,
            ]);


        
            $usuario = User::find( auth()->user()->id);
            $usuario->notify(new PagoNotification($pago));
            

            $suscripciones = DB::table('suscripciones')
                ->where('idCliente', auth()->user()->id)
                ->get();

            $videoSuscripcion = array();

            foreach ($suscripciones as $suscripcion) {
                //obteniendo datos de la tabla  suscripcion
                array_push($videoSuscripcion, $suscripcion->idVideo);
            }




            if (in_array($video->idVideo, $videoSuscripcion)) {
            } else {



                $video->Suscripciones()->attach(auth()->user()->id, [
                    'TipoSus' => 1,
                    'CreacionSus' => $datenow
                ]);



                $ultimoPago = Pago::where('idCliente', auth()->user()->id)->latest()->first();

                $video->DetallesPago()->attach($ultimoPago->idPago, [
                    'PrecioPago' =>  $amount,
                    'CreacionDetPag' => $datenow,
                    'ModificacionDetPag' => $datenow,

                ]);
            }
            // Dar una respuesta de éxito si todo salió bien
            return [
                'success' => true,
                'url' => '/streaming/suscripcion/video/' . $video->idVideo,

            ];
        }
    }



    public function error()
    {
        return (view('client.error.400'));
    }
}
