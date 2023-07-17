<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <!--<meta charset="UTF-8">-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>discoDeRulos - @yield('title')</title>
    <meta name="description" content="@yield('meta-description', 'metadescripción por defecto')">

    {{--<link rel="icon" href="{{ asset('/storage/img/castana.t.png') }}">--}}

    <!-- CSS BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS BOOTSTRAP 5 -->
    {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Estilos de liwire -->
    @livewireStyles

    <!--Popper-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- JS BOOTSTRAP 4 -->
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}

    <!-- JS BOOTSTRAP 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    

    

    <!-- Sweet alert 2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- ESTILOS CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css')}}">

</head>
<body>


    <!-- Header -->
    {{--@include('partials.nav')--}}

    <!-- mensajes de alerta -->
    @include('layouts.alertas')
 
 
    <!-- contenido -->
    @yield('content')
     
 
 
    <!-- Footer -->
    {{--@include('partials.footer')--}}


    {{--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <!-- JS livewire -->
    @livewireScripts
    
    <!-- Nuestro javascript -->
    <script src="{{ asset('/js/discoderulos-core.js')}}"></script>
    



</body>
</html>