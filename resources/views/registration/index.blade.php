@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
@stop

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<div class="row my-4">
    <div class="col-12">
        <h1 class="text-center">Lista de publicaciones</h1>
        <p class="text-end">
            <a href="{{ route('registrations.create') }}">
                <button type="button" class="btn btn-primary" style="margin-right: 5px;">Agregar</button>
            </a>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <table id="crud" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Periodo</th>
                    <th scope="col" class="text-center">Actividad</th>
                    <th scope="col" class="text-center">Instructor</th>
                    <th scope="col" class="text-center">Grupo</th>
                    <th scope="col" class="text-center">Área</th>
                    <th scope="col" class="text-center">Número de control</th>
                    <th scope="col" class="text-center">Alumno</th>
                    <th scope="col" class="text-center">Calificación</th>
                    <th scope="col" class="text-center">Carrera</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($registrations as $registration)
                <tr>
                    <td class="text-center">{{ $registration->period->long_name}}</td>
                    <td class="text-center">{{ $registration->activity->name }}</td>
                    <td class="text-center">{{ $registration->instructor->name }} {{ $registration->instructor->last_name }}</td>
                    <td class="text-center">{{ $registration->group->name }}</td>
                    <td class="text-center">{{ $registration->area->name }}</td>
                    <td class="text-center">{{ $registration->student->id }}</td>
                    <td class="text-center">{{ $registration->student->name}} {{ $registration->student->lastname }}</td>
                    <td class="text-center">{{ $registration->grade }}</td>
                    <td class="text-center">{{ $registration->career->name }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center mb-3">
                            <div class="p-2">
                                <a href="{{ route('registrations.edit', $registration) }}">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="p-2">
                                <a href="{{ route('registrations.show', $registration) }}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="p-2">
                                <form action="{{ route('registrations.destroy', $registration) }}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script>
    $(document).ready(function() {
        $('#crud').DataTable({
            "language":{
                "search":   "Buscar",
                "lengthMenu":  "Mostrar _MENU_ inscripciones",
                "info":   "Mostrando página _PAGE_ de _PAGES_",
                "paginate":  {
                    "previous": "Anterior",
                    "next": "Siguiente",
                    "first":   "Primero",
                    "last":  "Ultimo"
                }
            }
        });
    });
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://kit.fontawesome.com/839bf29115.js" crossorigin="anonymous"></script>
@stop
