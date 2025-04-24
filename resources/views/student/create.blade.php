@extends('layouts.app')
@section('title')
    اضافة تلميذ
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>اضافة تلميذ</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.store') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">اسم التلميذ</span>
                                <input type="text" class="form-control" name="name" placeholder="برجاءادخال اسم التلمبذ">
                                @error('name')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">الرقم الوطني</span>
                                <input type="text" class="form-control" name="national_id" placeholder="برجاءادخال الرقم الوطني">
                                @error('national_id')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">رقم الهاتف</span>
                                <input type="text" class="form-control" name="phone" placeholder="برجاءادخال رقم الهاتف">
                                @error('phone')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">تاريخ ميلاد التلميذ</span>
                                <input type="text" data-provide="datepicker" class="form-control" name="date_of_birth" placeholder="برجاءادخال تاريخ الميلاد">
                                @error('date_of_birth')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">اختيار النوع</span>
                                <select class="form-control p-1 m-1" name="gender">
                                    <option value="null" selected disabled>برجاء اختيار الجنس</option>
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                                @error('gender')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">اختيار المرحلة</span>
                                <select class="form-control p-1 m-1" name="phase">
                                    <option value="null" selected disabled>برجاء اختيار المرحلة</option>
                                    @foreach($phases as $phase)
                                        <option value="{{ $phase->id }}">{{ $phase->name }}</option>
                                    @endforeach
                                </select>
                                @error('phase')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            {{-- <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">اختيار القسم</span>
                                <select class="form-control p-1 m-1" name="grad">
                                    <option value="null" selected disabled>برجاء اختيار القسم</option>
                                    @foreach($grads as $grad)
                                        <option value="{{ $grad->id }}">{{ $grad->name }}</option>
                                    @endforeach
                                </select>
                                @error('grad')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div> --}}
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">اختيار الصف</span>
                                <select class="form-control p-1 m-1" name="classes">
                                    <option value="null" selected disabled>برجاء اختيار الصف</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                @error('classes')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <button type="submit" class="btn btn-primary form-control">حفظ المعلومات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
