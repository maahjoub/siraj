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
                            <div class="d-flex justify-content-center flex-wrap">
                                <div class="col-md-3 m-1 alert alert-danger">
                                    <h3>الصف الأول</h3>
                                    <a class="text-decoration-none text-danger" href="{{ route('student.index') }}"><span class="title">عرض التفاصيل</span></a>
                                </div>
                                <div class="col-md-3 m-1 alert alert-warning">
                                    <h3>الصف الثاني</h3>
                                    <a class="text-decoration-none text-warning" href="{{ route('student.index') }}"><span class="title">عرض التفاصيل</span></a>
                                </div>
                                <div class="col-md-3 m-1 alert alert-primary">
                                    <h3>الصف الثالث</h3>
                                    <a class="text-decoration-none text-primary" href="{{ route('all.boy') }}"> <span class="title">عرض التفاصيل</span></a>
                                </div>
                                <div class="col-md-3 m-1 alert alert-info">
                                    <h3>الصف الرابع</h3>
                                    <a class="text-decoration-none text-info" href="{{ route('all.girl') }}"><span class="title">عرض التفاصيل</span></a>
                                </div>
                                <div class="col-md-3 m-1 alert alert-secondary">
                                    <h3>الصف الخامس</h3>
                                    <a class="text-decoration-none text-secondary" href="#"><span class="title">عرض التفاصيل</span></a>
                                </div>
                                <div class="col-md-3 m-1 alert alert-dark">
                                    <h3> الصف السادس</h3>
                                    <a class="text-decoration-none text-dark" href="#"><span class="title">عرض التفاصيل</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
