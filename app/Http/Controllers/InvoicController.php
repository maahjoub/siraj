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
            'discount' => $request->discount,
            'payment_method'=> $request->payment_method,
            'payment_number'=> $request->payment_number,
            'note' => $request->note,
            'student_id' => $id,
        ]);
        $stdinvoice = Invoic::where('student_id', $id)->latest()->first();
        $student = Student::where('id', $id)->first();
        $paidinvoice = Invoic::where('student_id', $id)->sum('amount');
        $allamount = Invoic::where('student_id', $student->id)->sum('amount');
        $discount = Invoic::where('student_id', $student->id)->first('discount');
        
        
        return view('invoice.print', compact(['stdinvoice', 'student', 'paidinvoice', 'discount', 'allamount']));
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

    public function payment(Request $request)
    {
        $today = now()->format('Y-m-d');
        $payment = Student::with('invoice')->get();
        return view('invoice.payment', compact('payment', 'today'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchDate = \Carbon\Carbon::parse($request->search)->format('Y-m-d');
        $resolt = Invoic::whereDate('created_at', $searchDate)->get();
        $search_payment = Student::with('invoice')->get();
        return view('invoice.payment', compact('resolt', 'search_payment', 'searchDate'));
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
        $invoices = Invoic::where('student_id', $id)->get();
        $discount = Invoic::where('student_id', $student->id)->first('discount');
        return view('invoice.show', compact(['invoices', 'student', 'paidinvoice', 'discount']));
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

    public function details($id)
    {
        $stdinvoice= Invoic::where('id', $id)->first();
        $student = Student::where('id', $stdinvoice->student_id )->first();
        $paidinvoice = Invoic::where('invoics.id', $id)->sum('amount');
        $allamount = Invoic::where('student_id', $student->id)->sum('amount');
        $discount = Invoic::where('student_id', $student->id)->first('discount');
        // dd($allamount);
        return view('invoice.print', compact(['stdinvoice', 'student', 'paidinvoice', 'discount', 'allamount']));
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
