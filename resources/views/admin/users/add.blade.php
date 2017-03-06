@extends('admin.layouts.layout')

@section('title')
أضف موظف
@endsection


@section('header')


@endsection




@section('content')
 <section class="content-header">
      <h1>
	إضافة مستخدم جديد
      </h1>
     
    </section>


 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(['url'=>'/adminpanel/users','method'=>'POST']) !!}
            @include('admin.users.form')
            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> تسجيل مستخدم
                                </button>
                            </div>
                        </div>
            {!! Form::close() !!}
         
          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection




