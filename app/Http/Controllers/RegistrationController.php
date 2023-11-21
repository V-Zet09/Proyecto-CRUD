<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Area;
use App\Models\Career;
use App\Models\Group;
use App\Models\Instructor;
use App\Models\Period;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        $registrations = Registration::all();
        return view('registration.index', compact('registrations'));
    }

    public function create()
    {
        $periods = Period::all();
        $activities = Activity::all();
        $instructors = Instructor::all();
        $groups = Group::all();
        $areas = Area::all();
        $careers = Career::all();
        $students = Student::all();

        return view('registration.create', compact('periods', 'activities', 'instructors', 'groups', 'areas', 'careers', 'students'));
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'period_id' => 'required',
        'activity_id' => 'required',
        'instructor_id' => 'required',
        'group_id' => 'required',
        'area_id' => 'required',
        'student_id' => 'required',
        'grade' => 'required',
        'career_id' => 'required',

    ], [
        'period_id.required' => 'El campo Periodo es obligatorio.',
        'activity_id.required' => 'El campo Actividad es obligatorio.',
        'instructor_id.required' => 'El campo Instructor es obligatorio.',
        'group_id.required' => 'El campo Grupo es obligatorio.',
        'area_id.required' => 'El campo Área es obligatorio.',
        'student_id.required' => 'El campo Estudiante es obligatorio.',
        'grade.required' => 'El campo Calificación es obligatorio.',
        'career_id.required' => 'El campo Carrera es obligatorio.',
    ]);

        $student = Student::where('id', $request->input('student_id'))->first();

        if (!$student) {
            return back()->withInput()->with('error', 'El número de control no se encuentra en el sistema registrado.');
        }

        Registration::create($data);
        return redirect()->route('registrations.index');
    }



    public function show(Registration $registration)
    {
        return view('registration.show', compact('registration'));
    }

    public function edit(Registration $registration)
    {
        $periods = Period::all();
        $activities = Activity::all();
        $instructors = Instructor::all();
        $groups = Group::all();
        $areas = Area::all();
        $careers = Career::all();
        $students = Student::all();

        return view('registration.edit', compact('registration', 'periods', 'activities', 'instructors', 'groups', 'areas', 'careers', 'students'));
    }

    public function update(Request $request, Registration $registration)
    {
        $data = $request->validate([
            'period_id' => 'required',
            'activity_id' => 'required',
            'instructor_id' => 'required',
            'group_id' => 'required',
            'area_id' => 'required',
            'student_id' => 'required',
            'grade' => 'required',
            'career_id' => 'required',
        ]);

        $registration->update($data);
        return redirect()->route('registrations.index');
    }

    public function destroy(Registration $registration)
    {
        $message = 'Registro eliminado con éxito';

        try {
            $registration->delete();
        } catch (\Exception $e) {
            $message = 'Error al eliminar el registro';
        }
        return redirect()->route('registrations.index')->with('message', $message);
    }


}
