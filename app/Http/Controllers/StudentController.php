<?php

namespace App\Http\Controllers;

use App\Models\Grad;
use App\Models\Phase;
use App\Models\Amount;
use App\Models\Gender;
use App\Models\Income;
use App\Models\Student;
use App\Models\ClassRom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(20);
        return view('student.index',compact('students')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::get();
        $grads = Grad::get();
        $phases = Phase::get();
        $classes = ClassRom::get();
        return view('student.create', compact(['genders', 'grads', 'phases', 'classes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validation = $this->validate($request, [
            'name'                      => ['required', 'string'],
            'date_of_birth'             => ['required', 'string'],
            'national_id'               => ['required', 'numeric'],
            'gender'                    => ['required'],
            'phase'                     => ['required'],
            'classes'                   => ['required'],
        ]);
        DB::beginTransaction();
        try {
            $student = Student::create([
                'name' => $request->name,
                'date_of_birth' => $request->date_of_birth,
                'nationality_number' => $request->national_id,
                'mobile' => $request->phone,
                // 'grad_id' => $request->grad,
                'gender_id' => $request->gender,
                'class_rom_id' => $request->classes,
                'phase_id' => $request->phase,
                'Std_number' => random_int($min = 1, $max = 999),
            ]);
            $amount = Amount::create([
                'amount' => $student->phase->amount
            ]);
            $income = Income::create([
                'total' => 700000
            ]);
            DB::commit();
            return redirect()->route('create.invoice',$student->id)->with('success', 'تم اضافة التلمبذ بنجاح');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $students = Student::where('name', 'like', '%' . $search . '%')->orWhere('Std_number', 'like', '%' . $search . '%')->paginate(20);
        dd($students);
        return view('student.search', compact('students'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', compact(['student']));
    }
    
    public function showAllClass($id)
    {
        $classes = ClassRom::where('phase_id', $id)->get();
        return view('student.allclass', compact(['classes']));
    }
    public function getByDate(Request $request)
    {
        $date = $request->input('date');

        if (!$date) {
            return response()->json([], 400);
        }

        $students = Student::whereDate('created_at', $date)->get();

        return response()->json($students);
    }
    
    public function showAllstudent ($id)
    {
        $students = Student::where('class_rom_id', $id)->paginate();
        return view('student.allstudent', compact(['students']));
    }

    public function showPhases()
    {
        $grades = Phase::with('classRoom')->get();
        
        return view('student.classRoom', compact(['grades']));
    }

    public function showAll($id)
    {
        $classes = ClassRom::where('phase_id', $id)->get();
        
        return view('student.classRoom', compact(['classes']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $genders = Gender::get();
        $grads = Grad::get();
        $phases = Phase::get();
        $classes = ClassRom::get();
        return view('student.edit', compact(['student','genders', 'grads', 'phases', 'classes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validation = $this->validate($request, [
            'name'                      => ['required', 'string'],
            'date_of_birth'             => ['required', 'string'],
            'national_id'               => ['required', 'numeric'],
            'gender'                    => ['required'],
            'phase'                     => ['required'],
            'grad'                      => ['required'],
            'classes'                   => ['required'],
        ]);
        $student->name = $request->name;
        $student->date_of_birth = $request->date_of_birth;
        $student->nationality_number = $request->national_id;
        $student->grad_id = $request->grad;
        $student->gender_id = $request->gender;
        $student->class_rom_id = $request->classes;
        $student->phase_id = $request->phase;
        $student->save();
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->back();
    }
}
