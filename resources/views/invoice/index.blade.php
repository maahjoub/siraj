@extends('layouts.app')
@section('title')
    عرض الفواتير
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>قائمة الطلاب</h2>
                    </div>
                    <div class="card-body">
                        <table class="border table-bordered table-responsivev table-sm w-100 p-2 text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الطالب</th>
                                <th>الصف</th>
                                <th>عمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $num = 0 @endphp
                            @foreach($students as $student)
                                @php $num += 1; @endphp
                                <tr>
                                    <td>{{  $num }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->classRom->name }}</td>
                                    <td>
                                        <a href="{{ route('invoice.show', $student->id) }}" class="btn btn-info btn-sm d-inline-flex"><i class="fa fa-eye text-dark"></i></a>
                                        <a href="{{ route('create.invoice', $student->id) }}" class="btn btn-warning text-success btn-sm d-inline-flex"><i class="fa fa-money"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{ $students->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
