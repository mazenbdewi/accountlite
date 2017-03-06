@extends('admin.layouts.layout')

@section('title')
أضف وظيفة جديدة
@endsection


@section('header')


@endsection




@section('content')
 <section class="content-header">
      <h1>
		إضافة وظيفة     
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li ><a href="{{ url('/adminpanel/employees')}}">التحكم بالوظائف </a></li>
        <li class="active"><a href="{{ url('/adminpanel/careers')}}">إضافة موظف جديد</a></li>
      </ol>
    </section>


 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">  إضافة وظيفة  جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <div class="container">
                      
                          
                            <div class="panel=body">
                                <h2><br/> انشاء وظيفة جديدة </h2><hr/>

                                  {!! Form::open(["url"=>"/adminpanel/careers" , "method"=>"POST" ]) !!}

                                       أدخل رتبة وظيفية  : {!! Form::text("careerName") !!}
                                  {!! Form::submit("Add" , ["class"=>"btn btn-info"]) !!}
                                  {!! Form::close() !!}

                            </div>
                                 @if($careers !=null)

                                    <table class="table">
                                              <tr>
                                                    <th><h3>اسم الوظيفة</h3></th>

                                                    <th><h3>تعديل</h3></th>

                                                    <th><h3>الحذف</h3></th>
                                              </tr>
                                               @foreach($careers as $career)

                                              <tr>




                                                 

                                                   <td> {!! Form::text("careerName",$career->careerName) !!}  </td>
                                                   

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
    </section>


@endsection



@section('footer')
@endsection




