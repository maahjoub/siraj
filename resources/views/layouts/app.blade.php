<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navcustom">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                مدرسة السراج المنير الخاصة
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @auth
                <li class="nav-item dropdown bg-info list-unstyled px-2 py-1 rounded-3 mx-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      عمليات الطلاب
                    </a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="{{ route('chose.gender') }}">عرض كل الطلاب </a></li>
                        <li><a class="dropdown-item" href="{{ route('student.create') }}">اضاقة تلميذ</a></li>
                        <li><a class="dropdown-item" href="{{ route('student.create') }}"> عرض اقساط الطالب</a></li>
                    </ul>
                  </li>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('invoice.payment') }}"> اليومية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('invoice.index') }}">الفواتير</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('report.index') }}">التقرير المالي</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="{{ route('student.search') }}" method="POST">
                        @csrf
                        <input class="form-control me-2" type="search" placeholder="اكتب اسم اطالب للبحث" aria-label="Search">
                        <button class="btn btn-success" type="submit">بحث</button>
                      </form>
                @endauth
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="watermark">
        <main class="py-4">
            <div class="margintop">
                @yield('content')
            </div>
        </main>
    </div>
</div>
@yield('js')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>

<script>
    $('.datepicker').datepicker();
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>

 <script>
        $(document).ready(function () {
            let table = $('#studentsTable').DataTable();

            $('#filterBtn').on('click', function () {
                let date = $('#filter_date').val();

                if (!date) {
                    alert("يرجى اختيار التاريخ");
                    return;
                }

                $.ajax({
                    url: '{{ route("students.byDate") }}',
                    method: 'GET',
                    data: { date: date },
                    success: function (response) {
                        table.clear(); // مسح البيانات القديمة

                        response.forEach(function (student) {
                            table.row.add([
                                student.id,
                                student.name,
                                student.email,
                                student.created_at
                            ]).draw(false);
                        });
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@if (App::getLocale() == 'en')
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/dataTables.bootstrap4.min.js') }}"></script>
@else
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/dataTables.bootstrap4.min.js') }}"></script>
@endif
</body>
</html>

