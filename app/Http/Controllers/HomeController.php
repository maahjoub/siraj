<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use App\Models\Income;
use App\Models\Invoic;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $amount = Income::sum('total');
        $amount = number_format($amount, 0, ',');
        $data = [
            'allAmount' => $amount,
            'studentCount' => Student::count(),
            'boyCount' => Student::where('gender_id', 1)->count(),
            'girlCount' => Student::where('gender_id', 2)->count(),
        ];

        return view('welcome', compact('data'));
    }

    public function boy()
    {
        $boys = Student::where('gender_id', 1)->paginate(20);
        return view('student.boy', compact('boys'));
    }

    public function girl()
    {
        $girls = Student::where('gender_id', 2)->paginate(20);
        return view('student.girl', compact('girls'));
    }

    public function bDetails()
    {
        return view('details.index');
    }

    public function classDetails($classId)
    {
        //
    }
}
