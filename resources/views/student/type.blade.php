@extends('layouts.app')
@section('content')
<div class="container content">
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h1>اختيار نوع الطلاب  </h1>
                </div>
                <div class="card-body">
                    <div class="row m-auto text-center">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-3 m-1 alert alert-danger">
                                {{-- <h3>عدد الطلاب الكلي</h3> --}}
                                <a class="text-decoration-none text-danger" href="{{ route('chose.grad', 1) }}"><span class="count">عرض الطلاب  </span></a>
                            </div>

                              <div class="col-md-3 m-1 alert alert-danger">
                                {{-- <h3>عدد الطلاب الكلي</h3> --}}
                                <a class="text-decoration-none text-danger" href="{{ route('chose.grad', 2) }}"><span class="count">عرض الطالبات  </span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
