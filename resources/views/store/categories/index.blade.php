@extends('admin.layouts.layout')

@section('title')
أضف نوع جديد
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
     
     
                              <h2><br/> انشاء نوع جديد </h2><hr/>

                                  {!! Form::open(["url"=>"/store/categories" , "method"=>"POST" ]) !!}

                                       أدخل نوع جديد  : {!! Form::text("categoryName") !!}
                                  {!! Form::submit("Add" , ["class"=>"btn btn-info"]) !!}
                                  {!! Form::close() !!}


       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
   
     </div>
    
</div>  
    
     
       <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modal1" style="float:right;">نوع جديد</button>


 <!-- Main content -->
   <section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
          <div class="panel panel-warning">
        <div class="panel-heading">اضف نوع جديد</div>
         <div class="panel-body">
            <!-- /.box-header -->
         
                         
                                 @if($categories !=null)

                                    <table class="table">
                                  
                                              <tr>
                                                    <th width="2%"><h3>تسلسل</h3></th>
                                                     <th width="2%"><h3>نوع المادة </h3></th>

                                                 
                                                    <th width="25%"><h3>الحذف</h3></th>
                                              </tr>
                                               @foreach($categories as $index => $category)

                                              <tr>




                                                  {!! Form::open(["url"=>"/store/categories/$category->id" , "method"=>"PATCH" ]) !!}

                                                  <td>{{$index+1}}</td>

                                                <td>    {!! Form::text("categoryName",$category->categoryName,array('readonly','class'=>'form-control')) !!} </td>
                                                   
                                                    <td>
                                                   {!! Form::open(["url"=>"/store/categories/$category->id" , "method"=>"delete" ]) !!}

                                               
                                                   {!! Form::submit("حذف" , ["class"=>"btn btn-danger"]) !!}
                                                    </td>
                                                   {!! Form::close() !!}

                                                        
                   
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




