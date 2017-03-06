@extends('admin.layouts.layout')

@section('title')
أضف وظيفة جديدة
@endsection


@section('header')
<style type="text/css">
  tr{text-align: center ;}
  td{text-align: center ;}
  th{text-align: center ;}

</style>

@endsection




@section('content')

  <div id="modal1" class="modal">
  <div class="modal-content">
     
     
                              
                                <h2><br/> انشاء وظيفة جديدة </h2><hr/>

                                  {!! Form::open(["url"=>"/adminpanel/careers" , "method"=>"POST" ]) !!}

                                       أدخل رتبة وظيفية  : {!! Form::text("careerName") !!}
                                  {!! Form::submit("حفظ" , ["class"=>"btn btn-info"]) !!}
                                  {!! Form::close() !!}



       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
   
     </div>
    
</div>  

       <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modal1" style="float:right;">وظيفة جديدة</button>


 <!-- Main content -->
    <section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
          <div class="panel panel-warning">
        <div class="panel-heading">أضف رتبة وظيفية جديدة</div>
         <div class="panel-body">
            <!-- /.box-header -->
            

          
                                 @if($careers !=null)

                                    <table  class="table table-striped"  >
                                  
                                              <tr>
                                                <th width="2%"><h3>تسلسل</h3></th>
                                                    <th width="2%"><h3>اسم الوظيفة</h3></th>

                                                  
                                                    <th width="25%"><h3>الحذف</h3></th>
                                              </tr>
                                               @foreach($careers as $index => $career)

                                              <tr>
                                                  <td>{{$index+1}}</td>

                                                   <td> {!! Form::text("careerName",$career->careerName,array('readonly','class'=>'form-control')) !!}  </td>
                                                   

                                                       <td>


                                                   {!! Form::open(["url"=>"/adminpanel/careers/$career->id" , "method"=>"delete" ]) !!}

                                               
                                                   {!! Form::submit("حذف" , ["class"=>"btn btn-danger"]) !!}
                                                   {!! Form::close() !!}

                                                        </td>
                   
                                               </tr>

                                                @endforeach
                                    </table>
                                 @endif
                 
           
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




