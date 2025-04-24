@extends('layouts.app')
@section('title')
    قائمة الطلاب
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
                            @php $num = 0 @endphp
                            @foreach($students as $student)
                            @php $num += 1; @endphp
                            <tr>
                                <td>{{  $num }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->classRom->name }}</td>
                                <td>{{ $student->phase->name }}</td>
                                <td>
                                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-info btn-sm d-inline-flex"><i class="fa fa-edit text-dark"></i></a>
                                    <a href="{{ route('student.show', $student->id) }}" class="btn btn-secondary btn-sm d-inline-flex"><i class="fa fa-eye"></i></a>
                                    <form action="{{ route('student.destroy', $student->id) }}" class=" d-inline-flex" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm d-inline-flex"><i class="fa fa-trash"></i></button>
                                    </form>
                                    <a href="{{ route('create.invoice', $student->id) }}" class="btn btn-warning text-success btn-sm d-inline-flex"><i class="fa fa-money"></i></a>
                                </td>
                            </tr>
                            
                            @endforeach
                        </table>
                    </div>



                    {{-- <div class="card-body">
                        <table class="border table-bordered table-responsivev table-sm w-100 p-2 text-center">
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
                            @php $num = 0 @endphp
                            @foreach($students as $student)
                                @php $num += 1; @endphp
                                <tr>
                                    <td>{{  $num }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->classRom->name }}</td>
                                    <td>{{ $student->phase->name }}</td>
                                    <td>
                                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-info btn-sm d-inline-flex"><i class="fa fa-edit text-dark"></i></a>
                                        <a href="{{ route('student.show', $student->id) }}" class="btn btn-secondary btn-sm d-inline-flex"><i class="fa fa-eye"></i></a>
                                        <form action="{{ route('student.destroy', $student->id) }}" class=" d-inline-flex" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm d-inline-flex"><i class="fa fa-trash"></i></button>
                                        </form>
                                        <a href="{{ route('create.invoice', $student->id) }}" class="btn btn-warning text-success btn-sm d-inline-flex"><i class="fa fa-money"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{ $students->links() }}
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
