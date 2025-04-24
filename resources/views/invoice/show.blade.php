@extends('layouts.app')
@section('title')
    ايصالات الطالب
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>ايصالات الطالب {{ $student->name }}</h2>
                    </div>
                    <div class="card-body">
                        <table class="border table-bordered table-responsivev table-sm w-100 p-2 text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الايصال</th>
                                <th>المبلغ</th>
                                <th>التعليق</th>
                                <th>عمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $num = 0 @endphp
                            @foreach($invoices as $invoice)
                                @php $num += 1; @endphp
                                <tr>
                                    <td>{{  $num }}</td>
                                    <td>{{ $invoice->name }}</td>
                                    <td>{{ $invoice->amount }}</td>
                                    <td>{{ $invoice->note }}</td>
                                    <td>
                                        <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-info btn-sm d-inline-flex"><i class="fa fa-edit text-dark"></i></a>
                                        <a href="{{ route('show.invoice', $invoice->id) }}" class="btn btn-secondary btn-sm d-inline-flex"><i class="fa fa-eye"></i></a>
                                        <form action="{{ route('invoice.destroy', $invoice->id) }}" class=" d-inline-flex" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm d-inline-flex"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{ $invoices->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
