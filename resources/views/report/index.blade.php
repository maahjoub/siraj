@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>التقرير المالي</h2>
                </div>
                <div class="card-body text-center">
                   <div class="row">
                        <div class="col-md-4 m-1 alert alert-success">
                            <h3>المبلغ الكلي</h3>
                            <a class="text-decoration-none text-success" href="{{ route('all.boy') }}"> <span class="count">{{ $num_discount }}</span></a>
                        </div>
                        <div class="col-md-4 m-1 alert alert-primary">
                            <h3>المبلغ المدفوع</h3>
                            <a class="text-decoration-none text-primary" href="{{ route('all.boy') }}"> <span class="count">{{$formated_amount}}</span></a>
                        </div>
                        <div class="col-md-4 m-1 alert alert-warning">
                            <h3>المبلغ المتبقي</h3>
                            <a class="text-decoration-none text-warning" href="{{ route('all.boy') }}"> <span class="count">{{ number_format( $f_remind , 0 ,',') }}</span></a>
                        </div>
                        <div class="col-md-4 m-1 alert alert-danger">
                            <h3>اجمالي التخفيض  </h3>
                            <a class="text-decoration-none text-danger" href="{{ route('all.boy') }}"> <span class="count">{{ $f_discount }}</span></a>
                        </div>

                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection