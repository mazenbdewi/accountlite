@extends('admin.layouts.layout')

@section('title')
سند قبض
@endsection


@section('header')


@endsection




@section('content')
 

 <!-- Main content -->
    <section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">سند قبض</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(["url"=>"/user/catchDocuments" , "method"=>"POST" ]) !!}
            @include('user.catchDocuments.form')
            {!! Form::submit("حفظ" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection




