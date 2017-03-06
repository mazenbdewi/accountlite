@extends('admin.layouts.layout')


@section('title')

 الموظفين 

@endsection


@section('header')


      

 
@endsection


   

@section('content')



<div id="modal1" class="modal">
  <div class="modal-content">
     
      {!! Form::open(["url"=>"/accountant/employees" , "method"=>"POST" ]) !!}
            @include('accountant.employees.form')
      {!! Form::submit("اضف " , ["class"=>"btn btn-info"]) !!}
      {!! Form::close() !!}

       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
   
     </div>
    
</div>  
    
     
       <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modal1" style="float:right;">موظف جديد</button>


      
      <a id='demo' class="btn btn-success " href="{{URL::to('/accountant/employees/print')}}" target="_blank" style="float:right;">معاينة طباعة</a>






  
  
    <!-- Main content -->
    <section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
          <div class="panel panel-info">
        <div class="panel-heading">بيانات الموظفين</div>
         <div class="panel-body">

              <table id="data" class="table table-striped" >
                <thead >
                <tr>
                  <th width="10%">التسلسل</th>
                  <th>الاسم الاول</th>
                  <th>الكنية</th>
                  <th> الجوال</th>
                  <th>الجنسية</th>
                  <th> الراتب</th>
                  <th>تفاصيل مالية</th>
                 
                  <th>تعديل</th>
                 
                 
                </tr>
                </thead>
                <tbody>

                @foreach($employees as $index => $employee)

                <tr >
                  <td>{{ $index+1 }}</td>
                  <td>{{ $employee->employeeFirstName }}</td>
                  <td>{{ $employee->employeeLastName }}</td>
                  <td>{{ $employee->employeeMobile }}</td>
                  <td>{{ $employee->employeeNational }}</td>
                  <td>{{ number_format($employee->employeeSalary,2) }}</td>
                 
                  <td> <a href="/accountant/employees/{{$employee->id}}" class="btn btn-default"> كشف حساب </a></td>
                  <td><a href="{{url('/accountant/employees/'.$employee->id.'/edit')}}">
                  <span  class="glyphicon glyphicon-pencil"></span></a>  </td>

                </tr>
                @endforeach

                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
                   <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      </div>
      </div>
</section>

      <!-- /.row -->
  
   


@endsection









@section('footer')




@endsection
