<!doctype html>
<html dir="rtl" lang="ar">
    <head>
        <meta charset="utf-8">
        <title>
      جدول المواد
        </title>
        <link rel="stylesheet" href="\style.css">
      
 
        <style type="text/css">
     * { font-family: "DejaVu Sans"; }
     /* reset */

*
{
    border: 0;
    box-sizing: content-box;
    color: inherit;
    font-family: inherit;
    font-size: 14px;
    font-style: inherit;
    font-weight: inherit;
    line-height: inherit;
    list-style: none;
    margin: 0;
    padding: 0;
    text-decoration: none;
    vertical-align: top;
}

/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }


/* heading */

h1 { font: bold 100% sans-serif;  text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: center; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }
body { box-sizing: border-box; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }


body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 1em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #eee; border-radius: 0.25em; color: #333; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: center; width: 12%; }
table.inventory td:nth-child(4) { text-align: center; width: 12%; }
table.inventory td:nth-child(5) { text-align: center; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

/* javascript */
@media print {
    * { -webkit-print-color-adjust: exact; }
    html { background: none; padding: 0; }
    body { box-shadow: none; margin: 0; margin-top: 4cm; margin-bottom: 2cm; }
    span:empty { display: none; }
}

@page { margin: 2cm; }
    </style>
<script>
   
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
 
</script>
    </head>
    <body>

 <a href="#!" class="btn-floating orang" onclick="printDiv('printableArea')" value="Print" style="float:right;"><i class="material-icons">print</i></a>
    &nbsp;  &nbsp;  &nbsp;  &nbsp;
 <a href="/store/products" class="btn-floating orang" style="float:right;"><i class="material-icons">done</i></a>

    <div class="below_movie_left" id="printableArea">
        <header>
            <h1> جدول المواد
            </h1>
           
        </header>
        <article>
            
            <table    class="table table-bordered" >
                <tr>
                <th>تسلسل</th>
                 <th>رقم المادة</th>
                <th>اسم المادة</th>
                <th>العدد</th>
                <th>الوحدة</th>

                </tr>
                <tbody>
                @foreach($products as $product)
                <tr>
                 <td> {{$product->id}} </td>
                  <td> {{$product->productCode}}</td>

                 <td>{{$product->productName}}</td>
                 <td> {{$product->productQuntity}}</td>
                 <td> {{$product->productUnit}}</td>
                 </tr>
                @endforeach
                 
              </tbody> 
               
                   

            </table>


            
        </article>
        
   
   </div>

 
       
    </body>


    {!! Html::style('/bootstrap/css/bootstrap.min.css') !!}

    <div class="col-xs-8">
       <ul class="pagination pagination-sm">
                       {!! $products->links() !!}  
        </ul>
                 
   
    </div>
</html>