
  <body style="text-align: center" >
    
<!-- employees -->

         <li class="treeview"  >
          <a href="#">
            <i class="fa fa-users" ></i> <span>بيانات اساسية</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu" >
            <li><a href="{{ url('/accountant/careers')}}"><i class="fa fa-circle-o"></i>الرتب الوظيفية</a></li>
            <li><a href="{{ url('/accountant/employees')}}"><i class="fa fa-circle-o"></i>  الموظفين</a></li>
            <li><a href="{{ url('/accountant/customers')}}"><i class="fa fa-circle-o"></i>  الزبائن</a></li>
            <li><a href="{{ url('/accountant/providers')}}"><i class="fa fa-circle-o"></i>  الموردين</a></li>
            <li><a href="{{ url('/accountant/opens')}}"><i class="fa fa-circle-o"></i>قيد افتتاحي</a></li>


          </ul>
        </li>
<!--Product--> 

          <li class="treeview" >
          <a href="#">
            <i class="fa fa-users"></i> <span>المواد</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/accountant/categories')}}"><i class="fa fa-circle-o"></i>اضافة نوع مادة</a></li>
            <li><a href="{{ url('/accountant/products')}}"><i class="fa fa-circle-o"></i>المواد</a></li>

          </ul>
        </li>

<!--Invoice--> 

          <li class="treeview" >
          <a href="#">
            <i class="fa fa-users"></i> <span>الحركة اليومية</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/accountant/inv/form')}}"><i class="fa fa-circle-o"></i>فاتورة بيع</a></li>
             <li><a href="{{ url('/accountant/inv/reform')}}"><i class="fa fa-circle-o"></i>مردود المبيعات</a></li>
             <li><a href="{{ url('/accountant/inv/formbuy')}}"><i class="fa fa-circle-o"></i>فاتورة شراء</a></li>
            <li><a href="{{ url('/accountant/inv/reformbuy')}}"><i class="fa fa-circle-o"></i>مردود المشتريات</a></li>
            <li><a href="{{ url('/accountant/accounts/create')}}"><i class="fa fa-circle-o"></i>سند صرف</a></li>
            <li><a href="{{ url('/accountant/catchDocuments/create')}}"><i class="fa fa-circle-o"></i>سند قبض</a></li>
          </ul>
        </li>

<!--Finanshel--> 

          <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>تقارير مالية</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu" >
           <li><a href="{{ url('/accountant/inv')}}"><i class="fa fa-circle-o"></i>جدول الفواتير</a></li>
           <li><a href="{{ url('/accountant/invsell')}}"><i class="fa fa-circle-o"></i>جدول سندات التسليم</a></li>
            <li><a href="{{ url('/accountant/accounts/showCash')}}"><i class="fa fa-circle-o"></i>حركة الصندوق</a></li>
            <li><a href="{{ url('/accountant')}}"><i class="fa fa-circle-o"></i>تقارير كاملة</a></li>
          </ul>
        </li>
  <!--Tools--> 

          <li class="treeview" >
          <a href="#">
            <i class="fa fa-users"></i> <span>أدوات</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
         
          <li><a href="{{ url('/accountant/backup')}}"><i class="fa fa-circle-o"></i> نسخ احتياطي</a></li>

          </ul>
        </li>


</body>
  





          


