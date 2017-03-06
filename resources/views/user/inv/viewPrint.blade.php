<!DOCTYPE html>
<html>
<head>
	<title>View Print</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://www.position-absoulte.com/creation/print/jquery.printPage.js"></script>
</head>
<body>
<a href="{{URL::to('/adminpanel/inv/35/print')}}" class="btnPrint">Print</a>
<script type="text/javascript">
	$(document).ready(function(){

		$('.btnPrint').printPage();
		

	});
</script>
</body>
</html>