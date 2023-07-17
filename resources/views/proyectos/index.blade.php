@extends('layouts.plantilla')

@section('title', 'Crear proyecto')
@section('meta-description', 'metadescripcion para la pagina de creación de proyecto')
    
    
@section('content')

<!-- Tabla de Productos -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
<script>
	$(document).ready( function () {
		$('#tabla_proyectos').DataTable({
			order: [
				[0, 'asc']
			]
		});
	} );
</script>


<div class="container text-center text-white my-4">
    <h1 class="text-center pt-2">PROYECTOS</h1>
</div>

<div class="container py-2">

	<div class="pb-3" style="overflow-x: scroll;">
		<table id="tabla_proyectos" class="display {{--table table-striped table-hover table-sm--}}">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Usuario</th>
					<th>Bpm</th>
					<th>Publico?</th>
					<th>Creado</th>
					<th>Audios</th>
                    <th>Colaboradores</th>
					<th>Administrar</th>
					
				</tr>
			</thead>
			<tbody>
			
				@foreach ($proyectos as $proyecto)
					<tr @if($proyecto->public) style="background-color: var(--verde-mate); color: var(--gris-muy-oscuro);" @endif>
                        <td>{{ $proyecto->id }}</td>
                        <td>{{ $proyecto->nombre }}</td>
                        <td>{{ $proyecto->descripcion }}</td>

                        <td>
                            @if($proyecto->user)
                                {{ $proyecto->user->name }}
                            @endif
                        </td>
                        <td>{{ $proyecto->bpm }}</td>
                        <td>
							@if($proyecto->public)
							SI
							@else
							NO
							@endif
						</td>
						<td>{{ $proyecto->created_at }}</td> {{--$proyecto->created_at->format('d/m/Y')--}}
						<td>{{ count($proyecto->audios) }}</td>
                        <td>{{ count($proyecto->colaboradores) }}</td>
						
                        <td><a href="{{--route('proyectos.edit', $proyecto)--}}" class="btn btn-sm btn-lightt ">Editar</a></td>
                        
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


</div>


<div class="text-center text-white mt-5">
    <h2 class="text-center pt-2">CREAR PROYECTO</h2>
</div>
    
    
<div class="container text-white">

    <div class="row mb-5 mt-2">
        <div class="col-md-12">

            <form class="p-3" action="{{route('proyectos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col col-md-6">

                        <!--input para el nombre-->
                        <div class="form-group mb-3">
                            <label for="nombre">Nombre</label>
                            <input required type="text" pattern="[A-Za-z0-9 ÁáÉéÍíÓóÚúÜüÑñ]{3,255}" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre')}}">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para la descripcion-->
                        <div class="form-group mb-3">
                            <label for="descripcion">Descripción <small>(opcional)</small></label>
                            <textarea pattern="[A-Za-z0-9 ÁáÉéÍíÓóÚúÜüÑñ]{3,255}" class="form-control" id="descripcion" name="descripcion" rows="3">{{old('descripcion')}}</textarea>
                            @error('descripcion')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-6">    

                        <!--input para el bpm-->
                        <div class="form-group mb-3">
                            <label for="bpm">Bpm <small>(opcional)</small></label>
                            <input type="number" step="0.01" pattern="\d{1,6}(\.\d{1,2})?" title="Por favor ingrese un valor con formato double(8,2)" class="form-control" id="bpm" name="bpm" placeholder="..." value="{{old('bpm')}}">
                            @error('bpm')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para checkbox 'public'-->
                        <div class="form-check my-4">
                            <input type="checkbox" class="form-check-input" id="public" name="public" value="1" @checked(old('public'))>
                            <label class="form-check-label" for="public">Publicar proyecto</label>
                            @error('public')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                
                    {{--
                    <div class="col-md-6">

                        <!--input para el tipo-->
                        <div class="form-group mb-3">
                            <label for="tipo">Tipo</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="horma">Horma</option>
                                <option value="untable">Untable</option>
                            </select>
                            @error('tipo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!--input para el stock-->
                        <div class="form-group mb-3">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="..." value="{{old('stock')}}" min="0" max="32765" style="width: 100%;">
                            @error('stock')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para el peso-->
                        <div class="form-group mb-3">
                            <label for="peso_neto">Peso neto</label>
                            <input type="number" class="form-control" id="peso_neto" name="peso_neto" placeholder="..." value="{{old('peso_neto')}}" min="0" style="width: 100%;">
                            @error('peso_neto')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para las categorias-->
                        <div class="form-group mb-3">
                            <label for="categorias">Categorías (opcional)</label>
                            <input type="text" class="form-control" id="categorias" name="categorias" placeholder="..." value="{{old('categorias')}}">
                        </div>

                        <!--input para los ingredientes-->
                        <div class="form-group mb-3">
                            <label for="ingredientes">Ingredientes</label>
                            <textarea required class="form-control" id="ingredientes" name="ingredientes" rows="2">{{old('ingredientes', 'Castañas de cajú, agua, sal, fermento.')}}</textarea>
                            @error('ingredientes')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="color">Color</label>
                            <input type="color" class="form-control" id="color" name="color" value="{{old('color', '#70802c')}}">
                            @error('color')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <!--input para la Información nutricional-->
                        <div class="form-group mb-3">
                            <label for="informacion_nutricional">Información nutricional</label>
                            <textarea required class="form-control" id="informacion_nutricional" name="informacion_nutricional" rows="12">{{old('informacion_nutricional', 'Porción energeticas.')}}</textarea>
                            @error('informacion_nutricional')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para la relevancia-->
                        <div class="form-group mb-3">
                            <label for="relevancia">Relevancia</label>
                            <input type="number" class="form-control" id="relevancia" name="relevancia" placeholder="..." value="{{old('relevancia')}}" min="0" style="width: 100%;">
                            @error('relevancia')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para la imagen-->
                        <div class="form-group mb-3">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                            @error('imagen')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                            
                    </div>
                    --}}


                </div>
        
                <button type="submit" class="btn btn-outline-secondary btn-block btn_crear">Crear</button>
                
            </form>
        </div>
    </div>


</div>



<script>
    $(document).ready(function(){
        $('.btn_crear').click(function(){
            
            if(
                document.getElementById("nombre").validity.valid && 
                document.getElementById("descripcion").validity.valid && 
                document.getElementById("bpm").validity.valid 
            ){

                let timerInterval
                Swal.fire({
                title: 'Creando',
                html: 'Por favor espere.',
                timer: 18000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
                })
            }
        });
    });

</script>



@endsection


