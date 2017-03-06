@extends('admin.layouts.layout')

@section('title')
تعديل مستخدم
@endsection


@section('header')


@endsection




@section('content')

 <!-- Main content -->
    <section class="content" dir="rtl" lang="ar">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل مستخدم</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::model($users ,['route'=>['adminpanel.users.update',$users->id],'method'=>'PATCH'])!!}

             @include('admin.users.form')
            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> تعديل مستخدم
                                </button>
                            </div>
                        </div>
            {!! Form::close() !!}
            </div>
          
            <section class="content">

             {!! Form::open(['url'=>'adminpanel/users/changePassword','method'=>'POST'])!!}
             <input type="hidden" value="{{$users->id}}" name="users_id">
             <table>
             <tr>
              <td class="col-md-4">كلمة السر</td>

                            <td class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </td>
              </tr>
              <tr>
            <div class="form-group">
                            <td class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> تغيير كلمة السر
                                </button>
                            </td>
                        </div>
              </tr>
            {!! Form::close() !!}
            </table>
            </section>
         
          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection




