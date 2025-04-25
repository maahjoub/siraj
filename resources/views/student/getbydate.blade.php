@extends('layouts.app')
@section('title')
    قائمة الطلاب الجدد
@stop
@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>قائمة الطلاب</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الطالب</th>
                                <th>الصف</th>
                                <th>المرحلة</th>
                                <th>عمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                           
                            </tbody>
                    
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
