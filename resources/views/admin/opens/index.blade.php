@extends('admin.layouts.layout')

@section('title')
اضافة قيد افتتاحي
@endsection


@section('header')


@endsection




@section('content')
 
<style type="text/css">
  
  th {
     text-align: center;
     font-size:16px;
     }
  td {
     text-align: center;
     font-size:16px;
     }
  
</style>
 <!-- Main content -->
    <section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
            <div class="panel panel-info ">
        <div class="panel-heading">اضافة قيد افتتاحي </div>
         <div class="panel-body">
                      
                          
                            <div class="panel=body">
                             

                                  {!! Form::open(["url"=>"/adminpanel/opens" , "method"=>"POST" ]) !!}
                                  <table>
                                  <tr>
                                   <td><input type="text" name="cash" id="cash" placeholder="الصندوق" class="form-control">
                                     </td>
                                   <td>   <input type="text" name="bank" id="bank" placeholder="البنك" class="form-control"></td>
                                    <td>  <input type="text" name="firstGoods" id="firstGoods" placeholder="بضاعة أول المدة" class="form-control"></td>
                                   <td>   <input type="text" name="lastGoods" id="lastGoods" placeholder="بضاعة آخر المدة" class="form-control"></td>
                                   <td>   <input type="date" name="DateOpen" id="DateOpen" class="form-control" ></td>

                                  </tr>
                                  </table>
                                    <br / >
                                    <br / >
                                    <br / >
                                      
                                  {!! Form::submit("اضافة" , ["class"=>"btn btn-info"]) !!}
                                  {!! Form::close() !!}

                            </div>
                                 @if($opens !=null)
            <div class="box box-info">
            <div class="box-header with-border">
            

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th >الصندوق</th>
                    <th>البنك</th>
                    <th>بضاعة أول المدة</th>
                    <th>بضاعة آخر المدة</th>
                     <th>التاريخ</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($opens as $open)
                  <tr>
                    <td><span data-prefix>ريال</span><span class="label label-success">{{number_format($open->cash,2)}}</span></td>
                    <td><span data-prefix>ريال</span><span  class="label label-success">{{number_format($open->bank,2)}}</span></td>
                    <td><span data-prefix>ريال</span><span class="label label-success">{{number_format($open->firstGoods,2)}}</span></td>
                    <td><span data-prefix>ريال</span>

                      <span class="label label-success">{{number_format($open->lastGoods,2)}}</span>
                    </td>
                   <td><span class="label label-success">{{$open->DateOpen}}</span></td>
                  </tr>
                 
                   @endforeach                             
                              
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>

                                 @endif
                 
                 </div>
                 </div>
                 </div>
                 </div>
                 </div>
                 </div>
                 </div>
                 </section>



            

@endsection



@section('footer')
@endsection




