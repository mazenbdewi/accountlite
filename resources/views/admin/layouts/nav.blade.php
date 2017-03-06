
 	<body style="text-align: center" >
  	
<!-- employees -->

         <li class="treeview"  >
          <a href="#">
            <i class="fa fa-users" ></i> <span>بيانات اساسية</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu" >
            <li><a href="{{ url('/adminpanel/careers')}}"><i class="fa fa-circle-o"></i>الرتب الوظيفية</a></li>
            <li><a href="{{ url('/adminpanel/employees')}}"><i class="fa fa-circle-o"></i>  الموظفين</a></li>
            <li><a href="{{ url('/adminpanel/customers')}}"><i class="fa fa-circle-o"></i>  الزبائن</a></li>
            <li><a href="{{ url('/adminpanel/providers')}}"><i class="fa fa-circle-o"></i>  الموردين</a></li>


          </ul>
        </li>
<!--Product--> 

          <li class="treeview" >
          <a href="#">
            <i class="fa fa-users"></i> <span>المواد</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/adminpanel/categories')}}"><i class="fa fa-circle-o"></i>اضافة نوع مادة</a></li>
            <li><a href="{{ url('/adminpanel/products')}}"><i class="fa fa-circle-o"></i>المواد</a></li>

          </ul>
        </li>

<!--Invoice--> 

          <li class="treeview" >
          <a href="#">
            <i class="fa fa-users"></i> <span>الحركة اليومية</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/adminpanel/inv/form')}}"><i class="fa fa-circle-o"></i>فاتورة بيع</a></li>
             <li><a href="{{ url('/adminpanel/inv/reform')}}"><i class="fa fa-circle-o"></i>مردود مبيع </a></li>
            <li><a href="{{ url('/adminpanel/inv/formbuy')}}"><i class="fa fa-circle-o"></i>فاتورة شراء</a></li>
            <li><a href="{{ url('/adminpanel/inv/reformbuy')}}"><i class="fa fa-circle-o"></i>مردود شراء</a></li>
           
            
            <li><a href="{{ url('/adminpanel/accounts/create')}}"><i class="fa fa-circle-o"></i>سند صرف</a></li>
            <li><a href="{{ url('/adminpanel/catchDocuments/create')}}"><i class="fa fa-circle-o"></i>سند قبض</a></li>
          </ul>
        </li>

<!--Finanshel--> 

          <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>تقارير مالية</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu" >
        
           <li><a href="{{ url('/adminpanel/inv')}}"><i class="fa fa-circle-o"></i>جدول فواتير البيع</a></li>
             <li><a href="{{ url('/adminpanel/invbuy')}}"><i class="fa fa-circle-o"></i>جدول فواتير الشراء</a></li>
            <li><a href="{{ url('/adminpanel/invsell')}}"><i class="fa fa-circle-o"></i>جدول سندات التسليم</a></li>
             <li><a href="{{ url('/adminpanel/invall')}}"><i class="fa fa-circle-o"></i>جدول السندات والفواتير</a></li>
           
            <li><a href="{{ url('/adminpanel/accounts/showCash')}}"><i class="fa fa-circle-o"></i>حركة الصندوق</a></li>
            <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-circle-o"></i>تقارير كاملة</a></li>
          </ul>
        </li>
  <!--Tools--> 

          <li class="treeview" >
          <a href="#">
            <i class="fa fa-users"></i> <span>أدوات</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{ url('/adminpanel/users/create')}}"><i class="fa fa-circle-o"></i>إضافة مستخدم</a></li>
          <li><a href="{{ url('/adminpanel/users')}}"><i class="fa fa-circle-o"></i>عرض المستخدمين</a></li>
          <li><a href="{{ url('/adminpanel/backup')}}"><i class="fa fa-circle-o"></i> نسخ احتياطي</a></li>

          </ul>
        </li>


</body>
  





          


