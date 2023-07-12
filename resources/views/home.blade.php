@extends('layouts.plantilla')

@section('title', 'Home')
@section('meta-description', 'metadescripción del disco de rulos')
    
    
@section('content')


<div class="container">         
    <div class="text-center mt-5 pt-5 mb-3">
        <h1><strong>discoDeRulos.io</strong><span id="cursor-pulsante" class="ml-0">|</span></h1>
    </div>
    {{--<div class="flex justify-center">
        <audio controls id="audio" 
        src="{{ asset("storage/audios/para_asomar/1/1.ogg") }}"></audio>
    </div>--}}
</div>
    


<!-- CANVAS -->
<div class="containerr m-0 p-0">
    <div class="text-center m-0 p-0">
        <canvas id="canvas" class="m-0 p-0"></canvas>
    </div>
</div>


<!-- BOTONES -->
<div class="container">
    <div class="text-center mt-3">
        <button id="btnPlay" class="btn border py-4 px-3 rounded m-2">play</button>
        <button id="btnPause" class="btn border py-4 px-3 rounded m-2">pause</button>
        <button id="btnStop" class="btn border py-4 px-3 rounded m-2">stop</button>
        <button id="btnRevolver" class="btn border py-4 px-3 rounded m-2">revolver</button>
    </div>


    <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
        <div>Eugenio Palurdo 2023|</div>
        <br>
        <div>Web Audio API|</div>
        <br>
        <div>Laravel v{{ Illuminate\Foundation\Application::VERSION }}|</div>
        <br>
        <div>PHP v{{ PHP_VERSION }}|</div>
    </div> 
</div>

<script>
    
    // Declara las urls de los archivos de audio
    // si no funciona, puede ser que el error se deba a que los audios demoran un poco en cargar
    /*const audio_1 = '{{ asset("storage/audios/para_asomar/1/1.ogg") }}';
    const audio_2 = '{{ asset("storage/audios/para_asomar/2/1.ogg") }}';
    const audio_3 = '{{ asset("storage/audios/para_asomar/3/1.ogg") }}';
    const audio_4 = '{{ asset("storage/audios/para_asomar/4/2.ogg") }}'; 
    const audio_5 = '{{ asset("storage/audios/para_asomar/5/2.ogg") }}'; */

    const audio_1 = '{{ asset($audios[0]) }}';
    const audio_2 = '{{ asset($audios[1]) }}';
    const audio_3 = '{{ asset($audios[2]) }}';
    const audio_4 = '{{ asset($audios[3]) }}'; 
    const audio_5 = '{{ asset($audios[4]) }}'; 
    const audio_6 = '{{ asset($audios[5]) }}'; 
    console.log('audios seleccionados:');
    console.log(audio_1);
    console.log(audio_2);
    console.log(audio_3);
    console.log(audio_4);
    console.log(audio_5);
    console.log(audio_6);


</script>

@endsection


