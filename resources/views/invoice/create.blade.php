@extends('layouts.app')
@section('title')
    سداد رسوم
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2> سداد رسوم</h2>
                    </div>
                    <div class="card-body">

                      

                        <form action="{{ route('invoice.pay', $studentId) }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">نوع الرسوم</span>
                                <input type="text" class="form-control" name="name" placeholder="برجاءادخال اسم الرسوم">
                                @error('name')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"> المبلغ المدفوع</span>
                                <input type="text" class="form-control" name="money" placeholder="برجاءادخال مبلغ الرسوم">
                                @error('money')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            
                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"> التخفيض</span>
                                <input type="text" class="form-control" name="discount" placeholder="برجاءادخال التخفيض">
                                @error('discount')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">اختيار وسيلة الدفع</span>
                                <select class="form-control p-1 m-1" name="payment_method">
                                    <option value="null" selected disabled>برجاء اختيار 'طريقة اللدفع'</option>
                                    @foreach($statusValues as $statusValue)
                                        <option value="{{ $statusValue }}">{{ $statusValue }}</option>
                                    @endforeach
                                </select>
                                @error('phase')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>

                             </div>
                            
                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"> رقم العملية</span>
                                <input type="text" class="form-control" name="payment_number" placeholder="برجاءادخال رقم العملية">
                                @error('payment_number')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">ملاحظات </span>
                                <textarea type="text" class="form-control" name="note" placeholder="برجاء اضافة ملاحظات او تعليقات"></textarea>
                                @error('note')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <button type="submit" class="btn btn-primary form-control">حفظ المعلومات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

