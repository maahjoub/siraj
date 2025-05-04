@extends('layouts.app')
@section('content')
<div class="container content">
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h1>المراحل الدراسية </h1>
                </div>
                <div class="card-body">
                    <div class="row m-auto text-center">
                        <div class="d-flex justify-content-center">
                            @foreach($grades as $grade)
                            <div class="col-md-3 m-1 alert alert-danger">
                                {{-- <h3>عدد الطلاب الكلي</h3> --}}
                                <a class="text-decoration-none text-danger" href="{{ route('classes', [$type =>$type ,$grade->id]) }}"><span class="count">{{ $grade->name }}</span></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
