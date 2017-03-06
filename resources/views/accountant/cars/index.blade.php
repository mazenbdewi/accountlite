@extends('admin.layouts.layout')


@section('title')

معلومات السيارات 

@endsection


@section('header')


@endsection



@section('content')

   <div id="modal1" class="modal">
  <div class="modal-content">
   
          
      {!! Form::open(["url"=>"/accountant/cars" , "method"=>"POST"]) !!}
            @include('accountant.cars.form')
       {!! Form::submit("اضف " , ["class"=>"btn btn-info"]) !!}
      {!! Form::close() !!}

       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
   
     </div>
</div> 

      <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modal1" style="float:right;">زبون مفرق </button>
<a href="/accountant/inv/form">العودة الى الفواتير</a>
     
    <!-- Main content -->
    <section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
<div class="panel panel-danger">
        <div class="panel-heading">بيانات السيارات</div>
         <div class="panel-body">
              <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                   <th width="20%">رقم السيارة</th>
                  <th width="20%">الماركة</th>
                  <th width="20%"> الموديل</th>
               
                 
                  <th > تعديل </th>
                   <th width="5%">تفاصيل </th>
                 
                  
                </tr>
                </thead>
                <tbody>

                @foreach($cars as $car)

                <tr>
                  <td>{{ $car->carNumber }}</td>
                  <td>{{ $car->carName }}</td>
                  <td>{{ $car->carModel }}</td>
                
                 
                  <td><a href="{{url('/accountant/cars/'.$car->id.'/edit')}}">
                  <span class="glyphicon glyphicon-pencil"></span></a>  </td>
                
                   <td> <a href="/accountant/cars/{{$car->id}}" class="btn btn-default"> تفاصيل </a></td>

                  
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
