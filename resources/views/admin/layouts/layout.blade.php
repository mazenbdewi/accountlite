<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>لوحة التحكم |
    @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->

   {!! Html::style('/bootstrap/css/bootstrap.min.css') !!}

  {!! Html::style('/dist/css/skins/_all-skins.min.css') !!}
  {!! Html::style('/dist/css/AdminLTE.min.css') !!}


  {!! Html::script('/jquery/jquery.js') !!}

  {!! Html::script('/jquery/jquery.min.js') !!}



   <!--
  
  {!! Html::style('/out/font-awesome.min.css') !!}
  
  {!! Html::style('/out/ionicons.min.css') !!}
 
 
  
  
  {!! Html::style('/plugins/iCheck/flat/blue.css') !!}

 
 
  {!! Html::style('/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}


  {!! Html::style('/plugins/datepicker/datepicker3.css') !!}

 
  {!! Html::style('/plugins/daterangepicker/daterangepicker-bs3.css') !!}

  
  {!! Html::style('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}


-->
</head>
<style type="text/css">
  
td{text-align: center;}
th{text-align: center;}
tr{text-align: center;}

body {font-family:  tahoma, serif;}

.form-control{
    border-radius:5px;}

</style>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" >

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>عالم الاكسسوار</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
      <!-- Sidebar toggle button-->
      

     
      <div class="nav navbar-nav navbar-left">
                  
         <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>خروج</a></li>
      </div>
                      
                
  
   
   </header>
    @yield('header')
 
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/maincontroller/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name }}</p>
       
          <?php 

          if(Auth::user()->admin==1){
            echo '<p class="fa fa-circle text-success"> مسؤول عام</p>' ;
          }
          elseif (Auth::user()->admin==2) {
           echo '<p class="fa fa-circle text-success"> بائع</p>' ;
          }
          elseif (Auth::user()->admin==3) {
           echo '<p class="fa fa-circle text-success"> مندوب مبيعات</p>' ;
          }
          elseif (Auth::user()->admin==4) {
            echo '<p class="fa fa-circle text-success"> امين مستودع</p>' ;
          }
          elseif (Auth::user()->admin==0) {
            echo '<p class="fa fa-circle text-success"> محاسب</p>' ;
          }

          ?>
        </div>

      </div>
     
     <div>
     </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
      

@if( Auth::user()->admin ==1)
       
       @include('/admin.layouts.nav')

   @elseif(Auth::user()->admin ==0)
       @include('/admin.layouts.navAccountant')

   @elseif(Auth::user()->admin ==2)
       @include('/admin.layouts.navSeller')

   @elseif(Auth::user()->admin ==3)
       @include('/admin.layouts.navSellerOut')

   @elseif(Auth::user()->admin ==4)
       @include('/admin.layouts.navStore')

   

@endif

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


  <div class="content-wrapper">

  @if(Session::has('m')) 
    <div class="container">
       <?php $a=[]; $a=session()->pull('m'); ?> 
       <div class="alert alert-{{ $a[0] }}">
        {{ $a[1] }} 
       </div>
    </div>
  @endif


  @yield('content')
  </div>



   <footer class="page-footer" style="background:#ffffff;" >
    <div class="container" >
    <div class="row">
    

    
    
    Copyright &copy; 2016 <a href="mail:mazen.bdewi@gmail.com">Mazen Bdewi</a>. All rights
    reserved.
   
    
    </div>
    </div>
    </div>
  </footer>
</div>

  <!-- Control Sidebar -->
  
    <!-- Tab panes -->
   
      <!-- /.tab-pane -->
   
          <!-- /.form-group -->

     
          <!-- /.form-group -->

        
          <!-- /.form-group -->

         
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
 
<!-- ./wrapper -->



<!-- ./wrapper -->
{!! Html::script('/out/jquery.min.js') !!}

<!-- jQuery 2.2.0 -->


<!-- jQuery UI 1.11.4 -->
<!-- {!! Html::script('/out/jquery-ui.min.js') !!}-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.6 -->
{!! Html::script('/bootstrap/js/bootstrap.min.js') !!}



{!! Html::script('/dist/js/app.min.js') !!}  

<!-- 
{!! Html::script('/out/raphael-min.js') !!}




{!! Html::script('/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}


{!! Html::script('/plugins/knob/jquery.knob.js') !!}


{!! Html::script('/out/moment.min.js') !!}

{!! Html::script('/plugins/daterangepicker/daterangepicker.js') !!}


{!! Html::script('/plugins/datepicker/bootstrap-datepicker.js') !!}


{!! Html::script('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}

{!! Html::script('/plugins/slimScroll/jquery.slimscroll.min.js') !!}

 -->


</body>
@yield('footer')

</html>
