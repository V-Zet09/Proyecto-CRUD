@extends('adminlte::page')

@section('title', 'Editar Inscripción')

@section('content_header')
@stop

@section('content')
    <form method="post" action="{{ route('registrations.update', $registration) }}">
        @method("PUT")
        @csrf

        <div class="form-group">
            <label for="period_id">Periodo</label>
            <select name="period_id" id="period_id" class="form-control">
                @foreach ($periods as $period)
                    <option value="{{ $period->id }}" {{ $registration->period_id == $period->id ? 'selected' : '' }}>
                        {{ $period->long_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="activity_id">Actividad</label>
            <select name="activity_id" id="activity_id" class="form-control">
                @foreach ($activities as $activity)
                    <option value="{{ $activity->id }}" {{ $registration->activity_id == $activity->id ? 'selected' : '' }}>
                        {{ $activity->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="instructor_id">Instructor</label>
            <select name="instructor_id" id="instructor_id" class="form-control">
                @foreach ($instructors as $instructor)
                    <option value="{{ $instructor->id }}" {{ $registration->instructor_id == $instructor->id ? 'selected' : '' }}>
                        {{ $instructor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="group_id">Grupo</label>
            <select name="group_id" id="group_id" class="form-control">
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}" {{ $registration->group_id == $group->id ? 'selected' : '' }}>
                        {{ $group->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="area_id">Área</label>
            <select name="area_id" id="area_id" class="form-control">
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}" {{ $registration->area_id == $area->id ? 'selected' : '' }}>
                        {{ $area->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="student_id">Número de control</label>
            <input type="text" name="student_id" id="student_id" class="form-control" value="{{ $registration->student_id }}">
        </div>

        <div class="form-group">
            <label for="grade">Calificación</label>
            <input type="text" name="grade" id="grade" class="form-control" value="{{ $registration->grade }}">
        </div>

        <div class="form-group">
            <label for="career_id">Carrera</label>
            <select name="career_id" id="career_id" class="form-control">
                @foreach ($careers as $career)
                    <option value="{{ $career->id }}" {{ $registration->career_id == $career->id ? 'selected' : '' }}>
                        {{ $career->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
