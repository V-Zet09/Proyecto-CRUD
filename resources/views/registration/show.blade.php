@extends('adminlte::page')

@section('title', 'Detalles de Inscripción')

@section('content_header')
    <h1 class="text-center mb-4">Detalles de Inscripción</h1>
</script>
@stop

@section('content')
<div class="row justify-content-center align-items-center" style="height: 80vh;">
    <div class="col-md-6">
        <div class="card border border-dark d-flex flex-column h-100" style="border-color: #000;">
            <div class="card-header">
                <h5 class="card-title text-center">Información de la Inscripción</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item border" style="border-color: #000;"><strong>Periodo:</strong> {{ $registration->period->long_name }}</li>
                    <li class="list-group-item border" style="border-color: #000;"><strong>Actividad:</strong> {{ $registration->activity->name }}</li>
                    <li class="list-group-item border" style="border-color: #000;"><strong>Instructor:</strong> {{ $registration->instructor->name }} {{ $registration->instructor->last_nameA }}</li>
                    <li class="list-group-item border" style="border-color: #000;"><strong>Grupo:</strong> {{ $registration->group->name }}</li>
                    <li class="list-group-item border" style="border-color: #000;"><strong>Área:</strong> {{ $registration->area->name }}</li>
                    <li class="list-group-item border" style="border-color: #000;"><strong>Número de control:</strong> {{ $registration->student->id }}</li>
                    <li class="list-group-item border" style="border-color: #000;"><strong>Alumno:</strong> {{ $registration->student->name }} {{ $registration->student->lastname }}</li>
                    <li class="list-group-item border" style="border-color: #000;"><strong>Calificación:</strong> {{ $registration->grade }}</li>
                    <li class="list-group-item border" style="border-color: #000;"><strong>Carrera:</strong> {{ $registration->career->name }}</li>
                </ul>
            </div>
            <div class="card-footer">
                <a href="{{ route('registrations.index') }}" class="btn btn-primary">Regresar a la lista</a>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop
