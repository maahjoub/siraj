@extends('layouts.app')
@section('title')
    قائمة الطلاب الاناث
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>قائمة الطلاب البنات</h2>
                    </div>
                    <div class="card-body">
                        <table class="border table-bordered table-responsivev table-sm w-100 p-2 text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الطالب</th>
                                <th>الصف</th>
                                <th>المرحلة</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $num = 0 @endphp
                            @foreach($girls as $student)
                                @php $num += 1; @endphp
                                <tr>
                                    <td>{{  $num }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->classRom->name }}</td>
                                    <td>{{ $student->phase->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{ $girls->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

