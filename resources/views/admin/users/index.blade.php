@extends('admin.layouts.layout')


@section('title')

التحكم في الموظفين 

@endsection


@section('header')

@endsection




@section('content')

<style type="text/css">
  
  th{ text-align:center;}
  td{ text-align:center;}


</style>

       <!-- Main content -->
    <section class="content" dir="rtl" lang="ar" >
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">بيانات المستخدمين </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="form-group">
            <input type="text" class="form-control" id="search" name="search" >
              </div>
              <table class="table table-bordered table-hover">
               
                <tr>
                  
                  <th>الاسم الكامل</th>
                  <th>العضوية</th>
                  <th>نسبة الحسم</th>
                  <th>تعديل</th>
                  <th>حذف</th>
               
                </tr>
               
                <tbody>

                @foreach($users as $user)

                <tr style="text-align:center;">
                  
                  <td>{{ $user->name }}</td>
                <td>  <?php
                   if($user->admin ==1)
                    echo "مدير";
                  elseif($user->admin ==2)
                    echo "بائع" ;
                  elseif($user->admin ==3)
                    echo "مندوب مبيعات" ;
                   elseif($user->admin ==4)
                    echo "أمين المستودع" ;
                   elseif($user->admin ==0)
                    echo "محاسب" ;

                    ?>
                </td>
                  <td>{{ $user->userDisc }}</td>
                 
                  <td><a href="{{url('/adminpanel/users/'.$user->id.'/edit')}}"> التعديل</a> </td>
                  <td><a href="{{url('/adminpanel/users/'.$user->id.'/delete')}}"> حذف</a></td>
                  
                </tr>
                @endforeach

                </tbody>
               
              </table>
           
            <!-- /.box-body -->
          </div>
        </div>
        </div>
        </div>
        </section>

               <script type="text/javascript">
  
            $('#search').on('keyup',function(){
                $value=$(this).val(); 
                  $.ajax({
                    type : 'get',
                    url  : '{{URL::to('search')}}',
                    data : {'search':$value},
                    success:function(data){
                      console.log(data);
                      //$('tbody').html(data);
                    }
                  });   
              })
          </script>          <!-- /.box -->
       
   


@endsection









@section('footer')





@endsection
