@extends('layouts.app')
@section('content')
<div class="container content">
    <div class="row">
        <div class="col-md-12 m-auto">
            
            <div class="card">
                <div class="card-header text-center">
                    <h1>الفصول الدراسية </h1>
                </div>
                
               <div class="d-flex flex-wrap gap-3 ">
                @foreach($classes as $class)
                <div class="card text-white bg-success mb-3 mx-auto" style="min-width:18rem;"> 
                    <div class="card-body">
                      <h5 class="card-title">
                        <a class="text-decoration-none text-danger" href="{{ route('all.student', [$class->id , $id] ) }}"><span class="count">{{ $class->name }}</span></a>
                      </h5>
                    </div>
                  </div>
              
               @endforeach  
            </div>  
            </div>
        </div>
    </div>
</div>
@endsection
