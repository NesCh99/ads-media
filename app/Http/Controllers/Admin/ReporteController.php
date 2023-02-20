<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Campeonato;
use App\Models\User;
use App\Models\Video;

class ReporteController extends Controller
{

    public function totalPagos(Request $request)
    {
        $pagos = $this->listaDePagos();
        $fechas = $this->añosDePagos();
        $año = $request->input('Años');

        if ($año === 'Todos los años' || is_null($request->input('Años'))) {
            $balanceMensual = $this->balanceGeneral();
        } else {


            $balanceMensual = $this->balanceMensual($año);
        }
        
        
        return view('admin.reportes.total', compact(
            'pagos',
            'fechas',
            'balanceMensual',
            'año'
        ));
    }

    public function listaDePagos()
    {
        $pagos = Pago::all();
        foreach ($pagos as $pago) {
            $gross = $pago->TotalPago;
            $comision = ($gross * 0.054) + 0.30;
            $pago['fee'] = $comision;
            $pago['net'] = $gross - $comision;
        }
        return $pagos;
    }

    public function balanceMensual($año)
    {


        for ($i = 1; $i <= 12; $i++) {
            if ($i < 9) {
                $mes = '0' . $i;
            } else {
                $mes = $i;
            }
            $pagos = Pago::whereYear('FechaHoraPago', $año)->whereMonth('FechaHoraPago', $mes)->get();
            $suma = 0;
            foreach ($pagos  as $pago) {
                $gross = $pago->TotalPago;
                $comision = ($gross * 0.054) + 0.30;
                $net = $gross - $comision;
                $suma = $suma + $net;
            }

            $balanceMensual['data'][] =  $suma;
        }


        return $balanceMensual = json_encode($balanceMensual);
    }



    public function balanceGeneral()
    {


        for ($i = 1; $i <= 12; $i++) {
            if ($i < 9) {
                $mes = '0' . $i;
            } else {
                $mes = $i;
            }
            $pagos = Pago::whereMonth('FechaHoraPago', $mes)->get();
            $suma = 0;
            foreach ($pagos  as $pago) {
                $gross = $pago->TotalPago;
                $comision = ($gross * 0.054) + 0.30;
                $net = $gross - $comision;
                $suma = $suma + $net;
            }

            $balanceMensual['data'][] =  $suma;
        }


        return $balanceMensual = json_encode($balanceMensual);
    }


    public function añosDePagos()
    {
        $pagos = Pago::select('FechaHoraPago')->get();
        $fechaMin = $pagos->min('FechaHoraPago');
        $fechaMax = $pagos->max('FechaHoraPago');
        $fechaMin = substr($fechaMin, 0, 4);
        $fechaMax = substr($fechaMax, 0, 4);
        $fechas = collect([['fechaMin' => $fechaMin], ['fechaMax' => $fechaMax]]);
        return    $fechas;
    }


    /* reporte para pagos por eventos */
    public function pagoEventos()
    {
        $pagosEventos = $this->detalles();

        return view('admin.reportes.evento', compact('pagosEventos'));
    }

    public function detalles()
    {
        $detalles = DB::table('detallespagos')
            ->join('pagos', 'pagos.idPago', '=', 'detallespagos.idPago')
            ->join('videos', 'videos.idVideo', '=', 'detallespagos.idVideo')->get();
        return $detalles;
    }



    /*REPORTE PARA LAS SUSCRIPCIONES */

    public function suscripciones(Request $request)
    {
        $fechas = $this->añosDeSuscripciones();
        $año = $request->input('Años');

        if ($año === 'Todos los años' || is_null($request->input('Años'))) {
            $suscripcionMensual = $this->suscripcionesGenerales();
        } else {

            $suscripcionMensual = $this->suscripcionesMensuales($año);
        }


        $suscripciones = $this->subs();


        return view('admin.reportes.suscripciones', compact(
            'suscripciones',
            'fechas',
            'año',
            'suscripcionMensual'
        ));
    }

    public function añosDeSuscripciones()
    {

        $suscripciones = DB::table('suscripciones')->select('CreacionSus')->get();
        $fechaMin = $suscripciones->min('CreacionSus');
        $fechaMax = $suscripciones->max('CreacionSus');
        $fechaMin = substr($fechaMin, 0, 4);
        $fechaMax = substr($fechaMax, 0, 4);
        $fechas = collect([['fechaMin' => $fechaMin], ['fechaMax' => $fechaMax]]);
        return    $fechas;
    }




    public function  subs()
    {
        $suscripciones = DB::table('suscripciones')
            ->join('videos', 'videos.idVideo', '=', 'suscripciones.idVideo')
            ->join('users', 'users.id', '=', 'suscripciones.idCliente')
            ->get();
        return $suscripciones;
    }




    public function suscripcionesMensuales($año)
    {
        for ($i = 1; $i <= 12; $i++) {
            if ($i < 9) {
                $mes = '0' . $i;
            } else {
                $mes = $i;
            }

            $suscripciones = DB::table('suscripciones')->whereYear('CreacionSus', $año)->whereMonth('CreacionSus', $mes)->get();

            $suma = 0;
            foreach ($suscripciones as $suscripcion) {
                $tipo = $suscripcion->TipoSus;
                $suma = $suma + 1;
            }

            $suscripcionMensual['data'][] =  $suma;
        }

        return $suscripcionMensual = json_encode($suscripcionMensual);
    }



    public function suscripcionesGenerales()
    {
        for ($i = 1; $i <= 12; $i++) {

            if ($i < 9) {
                $mes = '0' . $i;
            } else {
                $mes = $i;
            }

            $suscripciones = DB::table('suscripciones')->whereMonth('CreacionSus', $mes)->get();

            $suma = 0;
            foreach ($suscripciones as $suscripcion) {
                $tipo = $suscripcion->TipoSus;
                $suma = $suma + 1;
            }

            $suscripcionMensual['data'][] =  $suma;
        }

        return $suscripcionMensual = json_encode($suscripcionMensual);
    }








    public function suscripcionesEventos()
    {

        $suscripciones = $this->subs();
        return view('admin.reportes.suscripcionEvento', compact('suscripciones'));
    }


    public function suscripcionesCampeonatos()
    {

        $suscripciones = $this->subs();
        $campeonatos = Campeonato::all();
        $packSubs = $this->subs();

        $subs = array();
        
       $suscripciones= json_decode($suscripciones, true);
        foreach ($suscripciones as $k => &$suscripcion) {
            $i= $suscripcion['idVideo'];
            $subs[$suscripcion['idCampeonato']][$i] = $suscripcion;
           
        }
        $subs= collect($subs);
       
    



        return view('admin.reportes.suscripcionCampeonato', compact('campeonatos','packSubs','subs'));
    }
}
