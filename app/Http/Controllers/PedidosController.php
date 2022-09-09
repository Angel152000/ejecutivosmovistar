<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\categoria;
use App\Models\Servicios;
use Illuminate\Http\Request;
use Validator;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $objServicio = new Servicios();
        if ($id) 
        {
            $servicio = $objServicio->getServicioById($id);

            if($servicio)
            {
                $objCategoria = new Categoria();
                $categoria = $objCategoria->getNombreCategoria($servicio->id_categoria);

                $s_precio       = $this->moneda_chilena($servicio->precio);
                $s_precio_ins   = $this->moneda_chilena($servicio->precio_instalacion);
                $s_precio_luego = $this->moneda_chilena($servicio->precio_luego);

                $servicio->s_precio       = $s_precio;
                $servicio->s_precio_ins   = $s_precio_ins;
                $servicio->s_precio_luego = $s_precio_luego;
                $servicio->categoria = $categoria;

                $this->data['servicio'] = $servicio;
                return view('inicio.servicio',$this->data);
            }
            else
            {
                $this->data['msg'] = 'No se pudo encontrar el Servicio.';
                return json_encode($this->data);
            }
        } 
        else 
        {
            $this->data['msg'] = 'No se pudo encontrar el Servicio.';
            return json_encode($this->data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rules = array(
            'nombre'       => 'required|max:255',
            'apellido'     => 'required|max:255',
            'rut'          => 'required',
            'numero'       => 'required|numeric',
            'email'        => 'required|email',
            'direccion'    => 'required',
        ); 

        $msg = array(
            'nombre.required'    => 'Debe Ingresar su Nombre',
            'nombre.max'         => 'El Nombre no puede superar los 255 carácteres',
            'apellido.required'  => 'Debe Ingresar su Apellido',
            'apellido.max'       => 'El Apellido no puede superar los 255 carácteres',
            'rut.required'       => 'Debe Ingresar su Rut',
            'numero.required'    => 'Debe Ingresar un Nº de Contacto',
            'numero.numeric'     => 'El campo Nº de Contacto solo permite números',
            'email.required'     => 'Debe Ingresar un Email',
            'email.email'        => 'Debe Ingresar un Email Válido',
            'direccion.required' => 'Debe Ingresar una Dirección',
        );

        $validador = Validator::make($request->all(), $rules, $msg);

        if ($validador->passes()) 
        {
            $objPedidos = new Pedidos();

            $data = array(
                'id_servicio'     =>  $request->input('servicio'),
                'estado'          =>  'nocontactado',
                'nombre'          =>  $request->input('nombre'),
                'apellido'        =>  $request->input('apellido'),
                'rut'             =>  $request->input('rut'),
                'contacto'        =>  $request->input('numero'),
                'email'           =>  $request->input('email'),
                'direccion'       =>  $request->input('direccion'),
                'fecha_solicitud' =>  date("Y-m-d")
            );

            $response = $objPedidos->grabarPedidos($data);

            if($response)
            {
                $this->data['status'] = "success";
                $this->data['msg'] = "Servicio solicitado exitosamente, Pronto un Ejecutivo se contactara con usted.";
            }
            else
            {
                $this->data['status'] = "error";
                $this->data['msg'] = "Hubo un error al Solicitar el servicio, intente nuevamente.";
            }
        }
        else 
        {
            $this->data['status'] = "error";
            $this->data['msg'] = $validador->errors()->first();
        } 

        return json_encode($this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show(Pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedidos $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedidos $pedidos)
    {
        //
    }

    public function moneda_chilena($numero){
        $numero = (string)$numero;
        $puntos = floor((strlen($numero)-1)/3);
        $tmp = "";
        $pos = 1;
        for($i=strlen($numero)-1; $i>=0; $i--){
            $tmp = $tmp.substr($numero, $i, 1);
            if($pos%3==0 && $pos!=strlen($numero))
            $tmp = $tmp.".";
            $pos = $pos + 1;
        }
        $formateado = strrev($tmp);
        return $formateado;
    }
}
