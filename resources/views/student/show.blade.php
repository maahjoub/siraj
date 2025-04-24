@extends('layouts.app')
@section('title')
    اضافة تلميذ
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>تفاصيل معلومات الطالب</h2>
                    </div>
                    <div class="card-body">
                        <table class="border table-bordered table-responsivev table-sm w-100 p-2 text-center">
                            <thead>
                            <tr>
                                <th>اسم الطالب</th>
                                <th>الصف</th>
                                <th>تاريخ الميلاد</th>
                                <th>المرحلة</th>
                                <th>عمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->classRom->name }}</td>
                                <td>{{ $student->date_of_birth }}</td>
                                <td>{{ $student->phase->name }}</td>
                                <td>
                                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit text-dark"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
