@extends('base')

@section('body')
<main class='container mt-5 py-5'>
    
    <div class='row justify-content-center '>
        <div class='col-12 col-md-6'>
            <div class='card shadow'>
                <div class='card-header'>
                    <h4>Mis Notas</h4>
                </div>
                <div id='contenedorNotas' class='card-body daelScroll'>
                @foreach($notas as $n)
                <div id='{{$n->id}}' class='card my-3 marcador'>
                    <div class='card-body'>
                        <p>{{$n->title}}</p>
                    </div>
                </div>
                @endforeach
                </div>
                <div class='card-footer text-end py-3'>
                    <button class='btn btn-primary'data-bs-toggle="modal" data-bs-target="#exampleModal" >Agregar nota</button>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nota</h1>
                <button type="button" id='cerrar'class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id='formNota' method='post' action='{{route("store")}}'>
                    @csrf
                    <input type="hidden" id='flag' name='flag' value='0'>
                    <div class='mb-3'>
                        <label for="titulo" class='form-label'>Título</label>
                        <input type="text" name='titulo' id='titulo' value='' class='form-control' placeholder='Hola mundo'>
                        <small id='nt1' class='text-danger d-none ms-2'>El título no puede estar vacío.</small>
                    </div>

                    <div class='mb-3'>
                        <label for="texto" class='form-label'>Texto</label>
                        <textarea id="texto" name="texto" rows="5" class='form-control' placeholder='Ingrese su texto aquí...'></textarea>
                    </div>

                    <div class='mb-3 text-end'>
                        <a id='delete' class='btn btn-danger d-none'>Eliminar</a>
                        <button  id='guardar' class="btn btn-success" >Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


@endsection

@section('js')
<script>
$(document).ready(function(){
    controladorHome();
});
</script>
@endsection
