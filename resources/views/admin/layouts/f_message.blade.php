@if(Session::has('flash_message'))
 
 <script>
swal({   title: "Auto close alert!",   text:"{{Session::get('flash_message') }}" ,   timer: 2000,   showConfirmButton: false });

 </script>
 @endif