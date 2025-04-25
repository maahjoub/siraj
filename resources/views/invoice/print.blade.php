@extends('layouts.app')
@section('content')
<div class="container" id="print-content">
    <img src="{{ asset('image/1.jpeg') }}" class="img-logo1" alt="">
    <img src="{{ asset('image/1.jpeg') }}" class="img-logo2" alt="">
    <div class="row">
       
        <div class="col-md-6"> 
            <h2 class="text-center m-2">ولاية القضارف</h2>    
           <h3 class="text-center m-2">وزارة التربية والتوجية  - إدارة التعليم غير الحكومي</h3>
                <span class="fs-4 text-center d-block">مدرسة السراج المنير الخاصة</span>
            <div class="d-flex justify-content-around bg-info">
                <h2 class="text-center p-2 m-2">ايصال سداد رسوم</h2>
                <span class="invoice-id fs-3 p-2 m-2 text-center"> رقم الايصال :   {{ $stdinvoice->uuid }}</span>
            </div>
            <div class="name">
                <table class="table border pay-border table-bordered ">
                    <thead>
                    <tr>
                        <th>    اسم الرسوم    </th>
                        <th>    {{ $stdinvoice->name }}</th>
                    </tr>

                    <tr>
                        <th>    اسم الطالب    </th>
                        <th>    {{ $student->name }} </th></th>
                        <th>    رقم الطالب    </th>
                        <th>    {{ $student->Std_number }} </th></th>
                    </tr>

                    <tr>
                        <th>    المبلغ الكلي   </th>
                        <th>    700000 </th></th>
                        <th>    المبلغ المدفوع   </th>
                        <th>    {{ $stdinvoice->amount }} </th></th>
                    </tr>
                    <tr>
                        <th>    التحفيض</th>
                        <th>    {{ $stdinvoice->discount }} </th></th>
                        <th>    المبلغ المتبقي   </th>
                        <th>    {{(700000 - $paidinvoice) }} </th></th>
                    </tr>
                    
                    <tr>
                        <th>    طريقة الدفع     </th>
                        <th>     {{ $stdinvoice->payment_method }}  </th></th>
                    </tr>

                    <tr>
                        <th>  تاريخ الدفع    </th>
                        <th>    {{ $stdinvoice->created_at->format('d-m-Y') }}     </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="m-auto w-75">
        <button id="print-btn" class="btn btn-primary w-25 m-auto mt-2 mb-2" onclick="printDiv()">
            <i class="fa fa-print fa-2x"></i>
        </button>
    </div>
    <div class="hide">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-center m-2 mt-0">ولاية القضارف</h2>
                <h3 class="text-center m-2">وزارة التربية والتوجية  - إدارة التعليم غير الحكومي</h3>
                <span class="fs-4 text-center d-block">مدرسة السراج المنير الخاصة</span>
                <div class="d-flex justify-content-around bg-info">
                    <h2 class="text-center p-2 m-2">ايصال سداد رسوم</h2>
                    <span class="invoice-id fs-3 p-2 m-2 text-center"> رقم الايصال :   {{ $stdinvoice->uuid }}</span>
                </div>
                <div class="name">
                    <table class="table border table-bordered bg-secondary text-white">
                        <tshead>
                        <tr>
                            <th>    اسم الرسوم    </th>
                            <th>    {{ $stdinvoice->name }}</th>
                        </tr>

                        <tr>
                            <th>    رقم الطالب    </th>
                            <th>    {{ $student->name }} </th></th>
                            <th>    اسم الطالب    </th>
                            <th>    {{ $student->Std_number }} </th></th>
                        </tr>

                        <tr>
                            <th>    المبلغ المدفوع   </th>
                            <th>    {{ $stdinvoice->amount }} </th></th>
                            <th>    المبلغ المتبقي   </th>
                            <th>{{(700000 - $paidinvoice) }} </th></th>
                        </tr> 

                        <tr>
                            <th>    طريقة الدفع     </th>
                            <th>     {{ $stdinvoice->payment_method }}  </th></th>
                        </tr>

                        <tr>
                            <th>  تاريخ الدفع    </th>
                            <th>     {{ $stdinvoice->created_at->format('d-m-Y') }}     </th>
                        </tr>
                        </tshead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script type="text/javascript">
      function printDiv() {
        var printContent = document.getElementById('print-content').innerHTML,
            originalContent =document.body.innerHTML;
        document.body.innerHTML = printContent
          window.print()
          document.body.innerHTML =originalContent
          // location.reload()
      }
    </script>
@endsection
