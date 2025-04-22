<?php

namespace App\Http\Controllers;

use App\Models\Invoic;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvoicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(20);
        return view('invoice.index',compact('students')) ;
    }

    public function PayInvoice(Request $request, $id)
    {
        
        $stdPay = Invoic::create([
            'uuid' => random_int($min =1000,$max= 99999),
            'name' => $request->name,
            'amount' => $request->money,
            'payment_method'=> $request->payment_method,
            'note' => $request->note,
            'student_id' => $id,
        ]);
        $stdinvoice = Invoic::where('student_id', $id)->latest()->first();
        $student = Student::where('id', $id)->first();
        $paidinvoice = Invoic::where('student_id', $id)->sum('amount');
        return view('invoice.print', compact(['stdinvoice', 'student', 'paidinvoice']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($studentId)
    {
        $statusValues = Invoic::getEnumValues('payment_method');
        return view('invoice.create', compact(['studentId', 'statusValues']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoic  $invoic
     * @return \Illuminate\Http\Response
     */
    public function show(Invoic $invoic, $id)
    {
        $paidinvoice = Invoic::where('student_id', $id)->sum('amount');
        $student = Student::where('id', $id)->first();
        $invoices = Invoic::where('student_id', $id)->paginate(5);
        return view('invoice.show', compact(['invoices', 'student', 'paidinvoice']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoic  $invoic
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoic $invoic)
    {
        //
    }

    public function details(Invoic $invoic, $id)
    {
        $paidinvoice = Invoic::where('student_id', $id)->sum('amount');
        $stdinvoice= Invoic::where('id', $id)->first();
        $student = Student::where('id', $stdinvoice->student_id )->first();
        return view('invoice.print', compact(['stdinvoice', 'student', 'paidinvoice']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoic  $invoic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoic $invoic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoic  $invoic
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Invoic::where('id', $id)->delete();
        return back();
    }
}
