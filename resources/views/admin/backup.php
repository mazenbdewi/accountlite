<!DOCTYPE html>
<html>
<head>
  <title></title>

  


</head>
<body>
<div class="col-lg-4 col-lg-offset-4 ">
    <div class="form-group">

    <?php

$username = "root"; 
$password = ""; 
$hostname = "localhost"; 
$dbname   = "account";
$dir = "d:\\";

$dumpfname =$dir.$dbname . "_" . date("Y-m-d_H-i-s").".sql" ;

exec('C:\xampp\mysql\bin\mysqldump --opt -uroot -p123456   account >'.$dumpfname);

$zipfname =$dbname . "_" . date("Y-m-d_H-i-s").".zip";
$zip = new ZipArchive();
if($zip->open($zipfname,ZIPARCHIVE::CREATE)) 
{
   $zip->addFile($dumpfname,$dumpfname);
   $zip->close();
}
 
// read zip file and send it to standard output
if (file_exists($zipfname)) {
   header('Content-Description: File Transfer');
   header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($zipfname));
    flush();
    readfile($zipfname);
    exit;
}


//exec('C:\xampp\mysql\bin\mysql  -uroot -p123456   account3 < d:\sham.sql');
?>



    </div>








    </div>
</div>


</body>
</html>






