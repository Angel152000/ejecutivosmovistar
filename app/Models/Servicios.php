<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use JeroenNoten\LaravelAdminLte\View\Components\Form\Select;

class Servicios extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    public function getServicio()
    {
        $servicios =  DB::table($this->table)->get();
        return $servicios;
    }

    public function getServicioById($id)
    {
        $servicios =  DB::table($this->table)->where('id',$id)->first();
        return $servicios;
    }

    public function getNombreServicio($id)
    {
        $servicios =  DB::table($this->table)->select('nombre_servicio')->where('id',$id)->first();
        return $servicios;
    }

    public function getNombreServicioConCategoria($id)
    {
        $servicios =  DB::select("SELECT b.nombre FROM servicios as a, categorias as b WHERE a.id_categoria = b.id AND a.id = ".$id."");
        return $servicios[0]->nombre;
    }

    public function deleteServicio($id)
    {
        $delete_ser =  DB::table($this->table)
            ->where('id',$id)
            ->delete();
        return $delete_ser;
    }

    public function duplicateServicio($id)
    {
        $servicios =  DB::table($this->table)->where('id',$id)->first();

        if($servicios)
        {
            $duplicate_ser =  DB::table($this->table)->insert([
                'id_categoria'    => $servicios->id_categoria,
                'nombre_servicio' => $servicios->nombre_servicio,
                'tipo_servicio'   => $servicios->tipo_servicio,
                'precio'          => $servicios->precio,
                'estado'          => $servicios->estado
            ]);
        }
        else
        {
            $duplicate_ser = false;
        }
        
        return $duplicate_ser;
    }

}
