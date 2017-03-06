<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>المحاسب </title>
{!! Html::style('/css/bootstrap.min.css') !!}
{!! Html::style('/css/flexslider.css') !!}
{!! Html::style('/css/style.css') !!}
{!! Html::style('/css/font-awesome.min.css') !!}
{!! Html::script('/js/jquery.min.js') !!}


</head>
<body id="app-layout" style="direction:rtl">
    <nav class="navbar navbar-default navbar-static-top" style="text-align:center">

        <div class="container">
            <div class="navbar-header" >

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
               
            </div>
          

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
               
                <ul class="nav navbar-nav navbar-left">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">تسجيل دخول</a></li>
                       
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>تسجيل خروج</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                
            </div>
        </div>
    
    </nav>
   

    @yield('content')
{!! Html::script('/js/bootstrap.min.js')!!}
{!! Html::script('/js/jquery.flexslider.js')!!}
   

   
</body>
 <div class="footer">
  <div class="footer_bottom">
    <div class="follow-us"> <a class="fa fa-facebook social-icon" href="#"></a> <a class="fa fa-twitter social-icon" href="#"></a> <a class="fa fa-linkedin social-icon" href="#"></a> <a class="fa fa-google-plus social-icon" href="#"></a> </div>
    <div class="copy">
      <p>Copyright &copy; 2016 Oil . Design by <a href="http://www.templategarden.com" rel="nofollow">Mazen Bdewi</a></p>
    </div>
  </div>
</div>
</html>
