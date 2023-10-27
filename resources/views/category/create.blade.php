@extends('adminlte::page')

@section('title', 'Inscripción')

@section('content_header')
@stop

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="bg-white rounded p-4 border border-2 border-dark">
                <h1 class="text-center h3">Formulario de Inscripción</h1>
                <p class="text-center mb-4">Rellena el formulario con los datos que se te piden</p>

                <form action="{{ route('categories.store') }}" method="POST" novalidate>
                    @csrf

                    <!-- Period -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar"></i></span>
                            <select class="form-select form-select-lg form-control" name="period_id">
                                <option selected>Selecciona el periodo</option>
                                @foreach ($periods as $period)
                                    <option value="{{ $period->id }}">{{ $period->long_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('period_id')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Activity -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-activity"></i></span>
                            <select class="form-select form-select-lg form-control" name="activity_id">
                                <option selected>Selecciona la actividad</option>
                                @foreach ($activities as $activity)
                                    <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('activity_id')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Instructor -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3"><i class="bi bi-people"></i></span>
                            <select class="form-select form-select-lg form-control" name="instructor_id">
                                <option selected>Selecciona el instructor</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('instructor_id')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Group -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon4"><i class="bi bi-person-plus"></i></span>
                            <select class="form-select form-select-lg form-control" name="group_id">
                                <option selected>Seleciona el grupo</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('group_id')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Area -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon5"><i class="bi bi-person-workspace"></i></span>
                            <select class="form-select form-select-lg form-control" name="area_id">
                                <option selected>Selecciona el area</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('area_id')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- student_num_control -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon6"><i class="bi bi-lock"></i></span>
                            <input
                                id="student_id"
                                name="student_id"
                                class="form-control form-control-lg"
                                placeholder="Student ID"
                                type="number"
                                inputmode="numeric"
                                list="studentList">
                            <datalist id="studentList">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name}}</option>
                                @endforeach
                            </datalist>
                        </div>
                        @error('student_id')
                            <div class="text-danger text-center mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Grade-->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon7"><i class="bi bi-check"></i></span>
                            <input
                                id="grade"
                                name="grade"
                                class="form-control form-control-lg"
                                placeholder="Grade"
                                value="{{ old('grade') }}"
                                type="number"
                                inputmode="numeric">
                        </div>

                        @error('grade')
                            <div class="text-danger text-center mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Career -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon8"><i class="bi bi-book"></i></span>
                            <select class="form-select form-select-lg form-control" name="career_id">
                                <option selected>Selecciona la carrera</option>
                                @foreach ($careers as $career)
                                    <option value="{{ $career->id }}">{{ $career->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('career_id')
                            <div class="text-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
