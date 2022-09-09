<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;
use App\Models\Categoria;
use App\Models\Pedidos;
use Illuminate\Support\Facades\DB;

class ServiciosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $objServicios = new Servicios();
        $objCategoria = new Categoria();

        $servicios = $objServicios->getServicio();

        foreach ($servicios as $row) 
        {
            $nombre_categoria = $objCategoria->getNombreCategoria($row->id_categoria);
            $row->categoria = $nombre_categoria;
        }

        $this->data['servicios'] = $servicios;

        return view('catalogo.servicios.index', $this->data);
    }

    public function create()
    {
        return view('catalogo.servicios.create');
    }

    public function delete($id)
    {
        $objServicios = new Servicios();

        if ($id) 
        {
            $delete_servicio = $objServicios->deleteServicio($id);

            if($delete_servicio)
            {
                $this->data['status'] = 'success';
                $this->data['msg'] = 'Servicio eliminado correctamente.';
            }
            else
            {
                $this->data['msg'] = 'No se pudo elimninar el servicio.';
            }
        } 
        else 
        {
            $this->data['msg'] = 'No se pudo encontrar el servicio.';
        }
        return json_encode($this->data);
    }

    public function duplicate($id)
    {
        $objServicios = new Servicios();

        if ($id) 
        {
            $duplicate_servicio = $objServicios->duplicateServicio($id);

            if($duplicate_servicio)
            {
                $this->data['status'] = 'success';
                $this->data['msg'] = 'Servicio duplicado correctamente.';
            }
            else
            {
                $this->data['msg'] = 'No se pudo duplicar el servicio.';
            }
        } 
        else 
        {
            $this->data['msg'] = 'No se pudo duplicar el servicio.';
        }
        return json_encode($this->data);
    }

    public function show()
    {
        $objServicios = new Servicios();
        $objPedidos = new Pedidos();

        $pedidos = $objPedidos->getPedidos();

        foreach ($pedidos as $row) 
        {
            $nombre_servicio  = $objServicios->getNombreServicio($row->id_servicio);
            $nombre_categoria = $objServicios->getNombreServicioConCategoria($row->id_servicio);
            $row->servicio = $nombre_categoria.' '.$nombre_servicio->nombre_servicio;
            $row->fecha = date("d/m/Y", strtotime($row->fecha_solicitud));
        }

        $this->data['pedidos'] = $pedidos;

        return view('catalogo.pedidos.index', $this->data);
    }

    public function changeEstado($id,$estado)
    {
        if($estado && $id)
        {
            $update = DB::table('pedidos')->where('id',$id)->update(['estado' => $estado]);

            if($update)
            {
                $this->data['status'] = 'success';
                $this->data['msg'] = 'Estado cambiado correctamente.';
            }
            else
            {
                $this->data['msg'] = 'No se pudo cambiar el estado del pedido, Intentelo nuevamente.';
            }
        }
        else
        {
            $this->data['msg'] = 'No se pudo cambiar el estado del pedido, Intentelo nuevamente.';
        }

        return json_encode($this->data);
    }
}
