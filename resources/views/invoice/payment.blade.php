@extends('layouts.app')
@section('title')
    عرض الفواتير
@stop
@section('content')
    <div class="container">
        <form class="d-flex w-50 justify-content-around" role="search" action="{{ route('search') }}" method="POST">
            @csrf
            <input type="text" data-provide="datepicker" class="form-control"
             name="search" placeholder="برجاءادخال التاريخ للبحث ">
            <button class="btn btn-success mr-4" type="submit">بحث</button>
        </form>
    </div>
    <div class="container">
       @if ( isset($payment))
        <div class="table-responsive">
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                    data-page-length="50"
                    style="text-align: center">
                <thead>
                <tr>
                    <th>رقم الايصال</th>
                    <th>اسم الطالب</th>
                    <th>المبلغ المدفوع</th>
                    <th>طريقة الدفع</th>
                    <th> رقم العملية</th>
                    <th>تاريخ الدفع</th>
                    
                </tr>
                </thead>
                <tbody>
                @php $num = 0;
                $palance = 0;
                @endphp
                @foreach ( $payment as $pay )
                @foreach ( $pay->invoice as $invoic)
                @php $num += 1; @endphp
                
                @if ($today == $invoic->created_at)
                @php $palance += $invoic->amount @endphp
                    <tr>
                    <td>{{  $invoic->uuid }}</td>
                    <td>{{ $pay->name }}</td>
                    <td>{{ $invoic->amount }}</td>
                    <td>{{ $invoic->payment_method }}</td>
                    <td>{{ $invoic->payment_number ?? "كاش" }}</td>
                    <td>{{ $invoic->created_at }}</td>
                
                </tr> 
                @endif
                    
                @endforeach
                @endforeach
                
            </table>
            <div class="d-flex justify-content-around bg-primary text-white px-1 fw-bold py-2 fs-3 m-5 align-items-center">
                <div colspan="3">{{ "الرصيد" }}</div>
                <div colspan="2">{{ number_format($palance, 0, '.', ',') }}</div>
            </div>
        </div>
       @else
           <div class="table-responsive">
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                    data-page-length="50"
                    style="text-align: center">
                <thead>
                <tr>
                    <th>رقم الايصال</th>
                    <th>اسم الطالب</th>
                    <th>المبلغ المدفوع</th>
                    <th>طريقة الدفع</th>
                    <th> رقم العملية</th>
                    <th>تاريخ الدفع</th>
                    
                </tr>
                </thead>
                <tbody>
                @php $num = 0;
                $palance = 0;
                @endphp
                @foreach ( $search_payment as $pay )
                @foreach ( $pay->invoice as $invoic)
                @php $num += 1; @endphp
                
                @if ($searchDate == $invoic->created_at)
                @php $palance += $invoic->amount @endphp
                    <tr>
                    <td>{{  $invoic->uuid }}</td>
                    <td>{{ $pay->name }}</td>
                    <td>{{ $invoic->amount }}</td>
                    <td>{{ $invoic->payment_method }}</td>
                    <td>{{ $invoic->payment_number ?? "كاش" }}</td>
                    <td>{{ $invoic->created_at }}</td>
                
                </tr> 
                @endif
                    
                @endforeach
                @endforeach
                
            </table>
            <div class="d-flex justify-content-around bg-primary text-white px-1 fw-bold py-2 fs-3 m-5 align-items-center">
                <div colspan="3">{{ "الرصيد" }}</div>
                <div colspan="2">{{ number_format($palance, 0, '.', ',') }}</div>
            </div>
        </div> 
       @endif
    </div>
</div>
@endsection 
