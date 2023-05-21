<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        /*
        const audio_1 = '{{ asset("storage/audios/para_asomar/1/1.ogg") }}';
        const audio_2 = '{{ asset("storage/audios/para_asomar/2/1.ogg") }}';
        const audio_3 = '{{ asset("storage/audios/para_asomar/3/1.ogg") }}';
        const audio_4 = '{{ asset("storage/audios/para_asomar/4/2.ogg") }}'; 
        const audio_5 = '{{ asset("storage/audios/para_asomar/5/2.ogg") }}'; 
        */

        // condiciona if random para elejir una cancion u otra 
        $random = rand(1, 2); // genera un numero aleatorio entre 1 y 2
        // asigna aleatoriamente un string u otro
        
        $id_cancion = $random;

        //crea un array llamado $audios con las urls de los audios
        $audios = $this->get_audios($id_cancion);

        //return 'Hello World!';
        return view('home')->with('audios', $audios);
    }


    //funcion get_audios(). recibe el id_cancion. devuelve un array con las urls de los audios de la cancion
    public function get_audios($id_cancion)
    {
        // si el id_cancion es 1 las rutas de los audios son "storage/audios/para_asomar/"; si el id_cancion es 2 las rutas de los audios son "storage/audios/sin_primavera/"
        if ($id_cancion == 1) {
            $ruta = "storage/audios/para_asomar/";
        } else {
            $ruta = "storage/audios/sin_primavera/";
        }


        //crea un array llamado $audios con las urls de los audios
        $audios = [
            $ruta . mt_rand(1,40) .'.ogg',
            $ruta . mt_rand(1,40) .'.ogg',
            $ruta . mt_rand(1,40) .'.ogg',
            $ruta . mt_rand(1,40) .'.ogg',
            $ruta . mt_rand(1,40) .'.ogg',
            $ruta . mt_rand(1,40) .'.ogg',
        ];

        return $audios;
    }

}
