<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Invoic;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $total = Income::sum('total');
        $discount = Invoic::sum('discount');
        $num_discount = number_format(str_pad(intval($total - $discount), 6, '0'), 0, '0,');
        $formaated_total = number_format($total, 0, ',');
        $amount = Invoic::sum('amount');

        $formated_amount = number_format($amount, 0, ',');
        $remind = intval($num_discount) - intval($formated_amount);
        $minos = $total - (int)$amount;
        $f_minos = number_format($minos, 0, ',');
       $f_discount = number_format($discount, 0, ',');
       $f_remind = $total - $amount - $discount;
        return view('report.index', compact('formaated_total', 'formated_amount', 'f_minos' , 'num_discount' , 'f_discount', 'f_remind'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     * 
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
