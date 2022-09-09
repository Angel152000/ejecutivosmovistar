<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    public function getCategorias()
    {
        $categorias = DB::table($this->table)->get();
        return $categorias;
    }

    public function getCategoriasActive()
    {
        $categorias = DB::table($this->table)->where('estado','activado')->get();
        return $categorias;
    }

    public function countCategorias()
    {
        $categorias = DB::table($this->table)->where('estado','activado')->count();
        return $categorias;
    }

    public function grabarCategoria($data)
    {
        $categorias = DB::table('categorias')->insert($data);
        return $categorias;
    }

    public function getNombreCategoria($id)
    {
        $nombre_categoria = DB::table($this->table)
            ->select('nombre')
            ->where('id',$id)    
            ->first();
        return $nombre_categoria->nombre;
    }

    public function deleteCategoria($id)
    {
        $delete_cat =  DB::table($this->table)
            ->where('id',$id)
            ->delete();
        return $delete_cat;
    }

    public function duplicateCategoria($id)
    {
        $categoria =  DB::table($this->table)->where('id',$id)->first();
        $ultima_posicion = DB::table($this->table)->orderBy('id', 'DESC')->first();

        if($categoria && $ultima_posicion)
        {
            $duplicate_cat =  DB::table($this->table)->insert([
                'nombre'      => $categoria->nombre,
                'sub_nombre'  => $categoria->sub_nombre,
                'descripcion' => $categoria->descripcion,
                'posicion'    => $ultima_posicion->posicion+1,
                'estado'      => 'desactivado',
                'es_nuevo'    => $categoria->es_nuevo,
            ]);
        }
        else
        {
            $duplicate_cat = false;
        }
        
        return $duplicate_cat;
    }
}
