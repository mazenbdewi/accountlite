@extends('admin.layouts.layout')


@section('title')

معلومات الزبائن 

@endsection


@section('header')


@endsection



@section('content')

   <div id="modal1" class="modal">
  <div class="modal-content">
   
          
      {!! Form::open(["url"=>"/sellerout/customers" , "method"=>"POST"]) !!}
            @include('sellerOut.customers.form')
       {!! Form::submit("اضف " , ["class"=>"btn btn-info"]) !!}
      {!! Form::close() !!}

       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
   
     </div>
</div> 

      <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modal1" style="float:right;">زبون جديد</button>

     
    <!-- Main content -->
    <section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
<div class="panel panel-danger">
        <div class="panel-heading">بيانات الزبائن</div>
         <div class="panel-body">
              <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th width="20%">تسلسل</th>
                   <th width="20%">الاسم الاول</th>
                  <th width="20%">الكنية</th>
                  <th width="20%"> الجوال</th>
                  <th width="20%">الحد الاإئتماني</th>
                 
              
               
                  
                </tr>
                </thead>
                <tbody>

                @foreach($customers as $index => $customer)

                <tr>
                  <td>{{ $index+1}}</td>
                  <td>{{ $customer->customerFirstName }}</td>
                  <td>{{ $customer->customerLastName }}</td>
                  <td>{{ $customer->customerMobile }}</td>
                  <td>{{ number_format($customer->limit,2) }}</td>
                
                 
                
                
              
                  
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
