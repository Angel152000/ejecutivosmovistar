<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;
use Validator;

class CategoriaController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objCategoria = new Categoria();

        $categorias = $objCategoria->getCategorias();

        $this->data['categorias'] = $categorias;

        return view('catalogo.categorias.index',$this->data);
    }

    public function create()
    {
        return view('catalogo.categorias.create');
    }

    public function store(Request $request)
	{
        $rules = array(
            'titulo'       => 'required|max:20',
            'sub_titulo'   => 'required|max:30',
            'descripcion'  => 'required|max:255',
            'estado'       => 'required',
            'es_nuevo'     => 'required',
            'posicion'     => 'required'
        ); 

        $msg = array(
            'titulo.required'       => 'El campo Título de Categoría es requerido',
            'titulo.max'            => 'El campo Título de Categoría no puede superar los 20 caracteres',
            'sub_titulo.required'   => 'El campo Sub Título de Categoría es requerido',
            'sub_titulo.max'        => 'El campo Sub Título de Categoría no puede superar los 30 caracteres',
            'descripcion.required'  => 'El campo Descripción es requerido',
            'descripcion.max'       => 'El campo Descripción no puede superar los 255 caracteres',
            'estado.required'       => 'El campo Estado es requerido',
            'es_nuevo.required'     => 'El campo Es nuevo es requerido',
            'posicion.required'     => 'El campo Posición es requerido'
        );

        $validador = Validator::make($request->all(), $rules, $msg);

        if ($validador->passes()) 
        {
            $objCategoria = new Categoria();

            $count = $objCategoria->countCategorias();

            if($count == 5)
            {
                $this->data['status'] = "error";
                $this->data['msg'] = "Solamente se pueden dejar 5 categorías activas.";
            }
            else
            {
                $data = array(
                    'nombre'      =>  $request->input('titulo'),
                    'sub_nombre'  =>  $request->input('sub_titulo'),
                    'descripcion' =>  $request->input('descripcion'),
                    'posicion'    =>  $request->input('posicion'),
                    'es_nuevo'    =>  $request->input('es_nuevo'),
                    'estado'      =>  $request->input('estado')
                );

                $response = $objCategoria->grabarCategoria($data);

                if($response)
                {
                    $this->data['status'] = "success";
                    $this->data['msg'] = "Categoría Creada exitosamente.";
                }
                else
                {
                    $this->data['status'] = "error";
                    $this->data['msg'] = "Hubo un error al insertar la categoría, intente nuevamente.";
                }
            }
        }
        else 
        {
            $this->data['status'] = "error";
            $this->data['msg'] = $validador->errors()->first();
        } 

        return json_encode($this->data);
    }

    public function delete($id)
    {
        $objCategoria = new Categoria();

        if ($id) 
        {
            $delete_categoria = $objCategoria->deleteCategoria($id);

            if($delete_categoria)
            {
                $this->data['status'] = 'success';
                $this->data['msg'] = 'Categoría eliminada correctamente.';
            }
            else
            {
                $this->data['msg'] = 'No se pudo elimninar la categoría.';
            }
        } 
        else 
        {
            $this->data['msg'] = 'No se pudo encontrar la categoría.';
        }
        return json_encode($this->data);
    }

    public function duplicate($id)
    {
        $objCategoria = new Categoria();

        if ($id) 
        {
            $duplicate_categoria = $objCategoria->duplicateCategoria($id);

            if($duplicate_categoria)
            {
                $this->data['status'] = 'success';
                $this->data['msg'] = 'Categoría duplicada correctamente.';
            }
            else
            {
                $this->data['msg'] = 'No se pudo duplicar la categoría.';
            }
        } 
        else 
        {
            $this->data['msg'] = 'No se pudo duplicar la categoría.';
        }
        return json_encode($this->data);
    }
}
