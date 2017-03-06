@extends('admin.layouts.layout')


@section('title')

معلومات الموردين 

@endsection


@section('header')


@endsection



@section('content')


   <div id="modal1" class=" modal modal-fixed-footer">
  <div class="modal-content">
   
       
      
      {!! Form::open(["url"=>"/accountant/providers" , "method"=>"POST" ]) !!}
            @include('accountant.providers.form')
       {!! Form::submit("اضف " , ["class"=>"btn btn-info"]) !!}
      {!! Form::close() !!}

       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
   
     </div>
</div>  
       <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modal1" style="float:right;">مورد جديد</button>
     

    <!-- Main content -->
    <section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
<div class="panel panel-danger">
        <div class="panel-heading">بيانات الموردين</div>
         <div class="panel-body">
              <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">تسلسل</th>
                  <th>الاسم الاول</th>
                 
                  <th>الكنية</th>
                  <th> الجوال</th>
                  <th>هاتف العمل</th>
                  <th>هاتف المنزل</th>
                 
                  
                 
                  <th width="5%">تفاصيل</th>
                
                  <th width="10%">الاستحقاقات</th>
                  
                </tr>
                </thead>
                <tbody>

                @foreach($providers as $index => $provider)

                <tr>
                  <td>{{ $index+1 }}</td>
                  <td>{{ $provider->providerFirstName }}</td>
                
                  <td>{{ $provider->providerLastName }}</td>
                  <td>{{ $provider->providerMobile }}</td>
                  <td>{{ $provider->providerPhoneJob }}</td>
                  <td>{{ $provider->providerPhoneHome }}</td>
                

                 
                  <td><a href="{{url('/accountant/providers/'.$provider->id.'/edit')}}" class="btn-floating orang">
                   <span  class="glyphicon glyphicon-pencil"></span></a>  </td>
                 <td> <a href="/accountant/providers/{{$provider->id}}" class="btn btn-default"> استحقاقات </a></td>

                  
                </tr>
                @endforeach

                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div>
      </div>

    </section>


@endsection









@section('footer')




@endsection
