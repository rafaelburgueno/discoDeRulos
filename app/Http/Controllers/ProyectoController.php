<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $proyectos = Proyecto::get();
            
        return view('proyectos.index')->with('proyectos', $proyectos);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $request->validate([ //TODO: revisar las validaciones 
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable|max:255',
            'bpm' => 'nullable|numeric',
            //'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        
        $proyecto = new Proyecto();
        
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->bpm = (float) $request->bpm;
        
        if($request->public){
            $proyecto->public = true;
        }else{
            $proyecto->public = false;
        }

        //si el usuario esta logueado, se guarda su id en user_id
        if(auth()->user()){
            $proyecto->user_id = auth()->user()->id;
        }

        $proyecto->save();


        /*
        //IMAGEN
        //se guarda en la carpeta storage/app/public/proyectos/
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/proyectos');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->nombre,
                'relevancia' => 1,
                'resolucion' => '',
                'tipo' => 'imagen',
                'tamano' => '',
                'multimediaable_id' => $proyecto->id,
                'multimediaable_type' => 'App\Models\proyecto',
                'activo' => true,
            ]);
   
        }*/

        session()->flash('exito', 'El proyecto fue creado.');
        return redirect() -> route('proyectos.index');
    }





}
