@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h1>الاحصائيات</h1>
                </div>
                <div class="card-body">
                    <div class="row m-auto text-center">
                        <div class="d-flex justify-content-center">
                        <div class="col-md-3 m-1 alert alert-danger">
                            <h3>عدد الطلاب الكلي</h3>
                            <a class="text-decoration-none text-danger" href="{{ route('student.index') }}"><span class="count">{{ $data['studentCount'] }}</span></a>
                        </div>
                        <div class="col-md-3 m-1 alert alert-warning">
                            <h3>عدد الطلاب الذكور</h3>
                            <a class="text-decoration-none text-warning" href="{{ route('all.boy') }}"> <span class="count">{{ $data['boyCount'] }}</span></a>
                        </div>
                        <div class="col-md-3 m-1 alert alert-primary">
                            <h3>عدد الطلاب الاناث</h3>
                            <a class="text-decoration-none text-primary" href="{{ route('all.girl') }}"><span class="count">{{ $data['girlCount'] }}</span></a>
                        </div>
                        <div class="col-md-3 m-1 alert alert-info">
                            <h3>الميزانية المتوقعة</h3>
                            <a class="text-decoration-none text-primary" href="#"><span class="count">{{ $data['allAmount'] }}</span></a>
                        </div>
{{--                        <div class="col-md-2 m-1 alert alert-info">test</div>--}}
                        </div>
                        <div class="card-header mt-2س"><h3>المراحل الدراسية</h3></div>
                        <div class="d-flex justify-content-center mt-3">
                            <div class="col-md-3 m-1 alert alert-secondary">
                                <h4> المرحلة الاعدادية</h4>
                                <a class="text-decoration-none text-warning" href="{{ route('base.details') }}"><span class="title">عرض التفاصيل</span></a>
                            </div>
                            <div class="col-md-3 m-1 alert alert-info">
                                <h4> المرحلة المتوسطة</h4>
                                <a class="text-decoration-none text-danger" href=""><span class="title">عرض التفاصيل</span></a>
                            </div>
                            <div class="col-md-3 m-1 alert alert-dark">
                                <h4> المرحلة الثانوية</h4>
                                <a class="text-decoration-none text-primary" href=""><span class="title">عرض التفاصيل</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
