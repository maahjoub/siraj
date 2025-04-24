@extends('layouts.app')
@section('title')
    تعديل تلميذ
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>تعديل تلميذ</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.update',$student->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">اسم التلميذ</span>
                                <input type="text" class="form-control" name="name" placeholder="برجاءادخال اسم التلمبذ" value="{{ $student->name }}">
                                @error('name')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">تاريخ ميلاد التلميذ</span>
                                <input type="text" class="form-control" name="date_of_birth" value="{{ $student->date_of_birth }}" placeholder="برجاءادخال تاريخ الميلاد">
                                @error('date_of_birth')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">الرقم الوطني</span>
                                <input type="text" class="form-control" name="national_id" value="{{ $student->nationality_number}}" placeholder="برجاءادخال الرقم الوطني">
                                @error('national_id')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">اختيار النوع</span>
                                <select class="form-control p-1 m-1" name="gender">
                                    <option value="{{ $student->gender->id}}" selected >{{ $student->gender->name}}</option>
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                                @error('gender')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">اختيار المرحلة</span>
                                <select class="form-control p-1 m-1" name="phase">
                                    <option value="{{ $student->phase->id}}" selected >{{ $student->phase->name}}</option>
                                    @foreach($phases as $phase)
                                        <option value="{{ $phase->id }}">{{ $phase->name }}</option>
                                    @endforeach
                                </select>
                                @error('phase')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">اختيار القسم</span>
                                <select class="form-control p-1 m-1" name="grad">
                                    <option value="{{ $student->grad->id }}" selected>{{ $student->grad->name }}</option>
                                    @foreach($grads as $grad)
                                        <option value="{{ $grad->id }}">{{ $grad->name }}</option>
                                    @endforeach
                                </select>
                                @error('grad')<div class="alert alert-danger w-100 me-1">{{ $message}}</div>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">اختيار الصف</span>
                                <select class="form-control p-1 m-1" name="classes">
                                    <option value="{{ $student->classRom->id }}" selected>{{ $student->classRom->name }}</option>
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
