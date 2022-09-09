<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Pedidos extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    public function getPedidos()
    {
        $pedidos =  DB::table($this->table)->get();
        return $pedidos;
    }

    public function grabarPedidos($data)
    {
        $pedidos = DB::table('pedidos')->insert($data);
        return $pedidos;
    }
}
