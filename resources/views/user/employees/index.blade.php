@extends('admin.layouts.layout')


@section('title')

التحكم في الموظفين 

@endsection


@section('header')


      

 
@endsection


   

@section('content')




    
     


      
      <a id='demo' class="btn btn-success " href="{{URL::to('/user/employees/print')}}" target="_blank" style="float:right;">معاينة طباعة</a>






  
  
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
                  
                  <th>الاسم الاول</th>
                  <th>الكنية</th>
                  <th> الجوال</th>
                  <th>الجنسية</th>
                  <th> الراتب</th>
                 
               
                 
                </tr>
                </thead>
                <tbody>

                @foreach($employees as $employee)

                <tr >
                  
                  <td>{{ $employee->employeeFirstName }}</td>
                  <td>{{ $employee->employeeLastName }}</td>
                  <td>{{ $employee->employeeMobile }}</td>
                  <td>{{ $employee->employeeNational }}</td>
                  <td>{{ number_format($employee->employeeSalary,2) }}</td>
                 
              
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
